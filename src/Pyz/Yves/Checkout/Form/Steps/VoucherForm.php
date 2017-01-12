<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Form\Steps;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Generated\Shared\Transfer\QuoteTransfer;

class VoucherForm extends AbstractType
{
    const VOUCHER_PROPERTY_PATH = QuoteTransfer::VOUCHER;
    const VOUCHER_INPUT_PROPERTY_PATH = QuoteTransfer::VOUCHER;

    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the form.
     *
     * @see FormTypeExtensionInterface::buildForm()
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder The form builder
     * @param array $options The options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(self::VOUCHER_PROPERTY_PATH, null, [
            'label' => "Voucher Code",
            'property_path' => self::VOUCHER_INPUT_PROPERTY_PATH,
        ]);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'voucherForm';
    }
}
