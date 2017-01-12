<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Module;

use Acceptance\Customer\Yves\PageObject\CustomerAddressesPage;
use Acceptance\Customer\Yves\PageObject\Customer as PageObjectCustomer;
use Acceptance\Customer\Yves\PageObject\CustomerLoginPage;
use Codeception\Module;
use Codeception\TestCase;
use Generated\Shared\Transfer\NewsletterSubscriberTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionRequestTransfer;
use Generated\Shared\Transfer\NewsletterTypeTransfer;
use Orm\Zed\Country\Persistence\SpyCountryQuery;
use Orm\Zed\Customer\Persistence\SpyCustomer;
use Orm\Zed\Customer\Persistence\SpyCustomerAddress;
use Orm\Zed\Customer\Persistence\SpyCustomerQuery;
use Pyz\Shared\Newsletter\NewsletterConstants;
use Spryker\Client\Session\SessionClient;
use Spryker\Zed\Customer\Business\CustomerFacade;
use Spryker\Zed\Newsletter\Business\NewsletterFacade;
use Symfony\Component\HttpFoundation\Session\Session;

class Customer extends Module
{

    /**
     * @param \Codeception\TestCase $step
     *
     * @return void
     */
    public function _before(TestCase $step)
    {
        $this->cleanUpDatabase();
    }

    /**
     * @return void
     */
    protected function cleanUpDatabase()
    {
        $customer = [
            PageObjectCustomer::NEW_CUSTOMER_EMAIL,
            PageObjectCustomer::REGISTERED_CUSTOMER_EMAIL,
        ];

        foreach ($customer as $customerEmail) {
            $this->deleteCustomerByEmail($customerEmail);
        }
    }

    /**
     * @param string $email
     *
     * @return void
     */
    protected function deleteCustomerByEmail($email)
    {
        $customerEntity = $this->loadCustomerByEmail($email);
        if ($customerEntity) {
            $this->deleteCustomerAddresses($customerEntity);
            $this->deleteNewsletterSubscription($customerEntity);

            $customerEntity->delete();
        }
    }

    /**
     * @param \Orm\Zed\Customer\Persistence\SpyCustomer $customerEntity
     *
     * @return void
     */
    protected function deleteCustomerAddresses(SpyCustomer $customerEntity)
    {
        $addresses = $customerEntity->getAddresses();
        if ($addresses) {
            $addresses->delete();
        }
    }

    /**
     * @param \Orm\Zed\Customer\Persistence\SpyCustomer $customerEntity
     *
     * @return void
     */
    protected function deleteNewsletterSubscription(SpyCustomer $customerEntity)
    {
        $newsletterSubscriptions = $customerEntity->getSpyNewsletterSubscribers();
        if ($newsletterSubscriptions) {
            foreach ($newsletterSubscriptions as $newsletterSubscription) {
                foreach ($newsletterSubscription->getSpyNewsletterSubscriptions() as $spyNewsletterSubscription) {
                    $spyNewsletterSubscription->delete();
                }
                $newsletterSubscription->delete();
            }
        }
    }

    /**
     * @param string $email
     *
     * @return \Orm\Zed\Customer\Persistence\SpyCustomer
     */
    public function loadCustomerByEmail($email)
    {
        $customerQuery = new SpyCustomerQuery();
        $customerEntity = $customerQuery->findOneByEmail($email);

        return $customerEntity;
    }

    /**
     * @param string $email
     *
     * @return void
     */
    public function haveRegisteredCustomer($email)
    {
        $customerEntity = $this->loadCustomerByEmail($email);
        if ($customerEntity) {
            return;
        }

        $this->setupSession();

        $customerTransfer = PageObjectCustomer::getCustomerData($email);

        $customerFacade = new CustomerFacade();
        $customerFacade->registerCustomer($customerTransfer);
    }

    /**
     * @param string $email
     * @param string $address
     * @param bool $isDefaultShipping
     * @param bool $isDefaultBilling
     *
     * @return void
     */
    public function addAddressToCustomer($email, $address, $isDefaultShipping = true, $isDefaultBilling = true)
    {
        $customerEntity = $this->loadCustomerByEmail($email);
        $addressTransfer = CustomerAddressesPage::getAddressData($address);

        $countryQuery = new SpyCountryQuery();
        $countryEntity = $countryQuery->findOneByIso2Code($addressTransfer->getIso2Code());

        $customerAddressEntity = new SpyCustomerAddress();
        $customerAddressEntity->fromArray($addressTransfer->toArray());
        $customerAddressEntity->setFkCountry($countryEntity->getIdCountry());
        $customerEntity->addAddress($customerAddressEntity);

        if ($isDefaultShipping) {
            $customerEntity->setShippingAddress($customerAddressEntity);
        }
        if ($isDefaultBilling) {
            $customerEntity->setBillingAddress($customerAddressEntity);
        }

        $customerEntity->save();
    }

    /**
     * @param string $email
     * @param string $type
     *
     * @return void
     */
    public function addNewsletterSubscription($email, $type = NewsletterConstants::EDITORIAL_NEWSLETTER)
    {
        $customerEntity = $this->loadCustomerByEmail($email);
        $newsletterSubscriberTransfer = new NewsletterSubscriberTransfer();
        $newsletterSubscriberTransfer->setEmail($email);
        $newsletterSubscriberTransfer->setFkCustomer($customerEntity->getIdCustomer());

        $newsletterSubscriptionType = new NewsletterTypeTransfer();
        $newsletterSubscriptionType->setName($type);

        $newsletterSubscriptionRequestTransfer = new NewsletterSubscriptionRequestTransfer();
        $newsletterSubscriptionRequestTransfer->setNewsletterSubscriber($newsletterSubscriberTransfer);
        $newsletterSubscriptionRequestTransfer->addSubscriptionType($newsletterSubscriptionType);

        $newsletterFacade = new NewsletterFacade();
        $newsletterFacade->subscribeWithDoubleOptIn($newsletterSubscriptionRequestTransfer);
    }

    /**
     * @param string $email
     *
     * @return void
     */
    public function amLoggedInCustomer($email = PageObjectCustomer::NEW_CUSTOMER_EMAIL)
    {
        $this->haveRegisteredCustomer($email);

        $i = $this->getWebDriver();
        $i->amOnPage(CustomerLoginPage::URL);
        $customerTransfer = PageObjectCustomer::getCustomerData($email);
        $i->submitForm(['name' => 'loginForm'], [
            CustomerLoginPage::FORM_FIELD_SELECTOR_EMAIL => $customerTransfer->getEmail(),
            CustomerLoginPage::FORM_FIELD_SELECTOR_PASSWORD => $customerTransfer->getPassword(),
        ]);

        $i->wait(2);
    }

    /**
     * @return \Codeception\Module\WebDriver
     */
    protected function getWebDriver()
    {
        return $this->getModule('WebDriver');
    }

    /**
     * @return void
     */
    protected function setupSession()
    {
        $sessionContainer = new Session();
        $sessionClient = new SessionClient();
        $sessionClient->setContainer($sessionContainer);
    }

}
