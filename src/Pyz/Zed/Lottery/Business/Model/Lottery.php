<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Lottery\Business\Model;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Orm\Zed\Lottery\Persistence\PyzLottery;
use Pyz\Zed\Lottery\Persistence\LotteryQueryContainerInterface;

class Lottery implements LotteryInterface
{

    const STATUS_WON = 'prize';

    /**
     * @var \Pyz\Zed\Lottery\Persistence\LotteryQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @var \Pyz\Zed\Lottery\Business\Model\LotteryApiInterface
     */
    protected $lotteryApi;

    /**
     * @param \Pyz\Zed\Lottery\Persistence\LotteryQueryContainerInterface $queryContainer
     * @param \Pyz\Zed\Lottery\Business\Model\LotteryApiInterface $lotteryApi
     */
    public function __construct(LotteryQueryContainerInterface $queryContainer, LotteryApiInterface $lotteryApi)
    {
        $this->lotteryApi = $lotteryApi;
        $this->queryContainer = $queryContainer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\CheckoutResponseTransfer $checkoutResponseTransfer
     *
     * @return \Generated\Shared\Transfer\CheckoutResponseTransfer
     */
    public function saveOrderData(QuoteTransfer $quoteTransfer, CheckoutResponseTransfer $checkoutResponseTransfer)
    {
        $customer = $quoteTransfer->getCustomer();

        $lotteryEntity = $this->queryContainer->queryLotteryByEmail($customer->getEmail())->findOneOrCreate();
        $lotteryEntity->setFirstName($customer->getFirstName());
        $lotteryEntity->setLastName($customer->getLastName());
        $lotteryEntity->setFkSalesOrder($checkoutResponseTransfer->getSaveOrder()->getIdSalesOrder());
        $lotteryEntity->save();

        return $checkoutResponseTransfer;
    }

    /**
     * @param int $idSalesOrder
     *
     * @return void
     */
    public function startLottery($idSalesOrder)
    {
        $lotteryEntity = $this->getLotteryEntity($idSalesOrder);

        if ($lotteryEntity) {
            $this->doTheLottery($lotteryEntity);
        }
    }

    /**
     * @param \Orm\Zed\Lottery\Persistence\PyzLottery $lotteryEntity
     *
     * @return void
     */
    protected function doTheLottery(PyzLottery $lotteryEntity)
    {
        $lotteryResponseTransfer = $this->lotteryApi->call(
            $lotteryEntity->getFirstName(),
            $lotteryEntity->getLastName(),
            $lotteryEntity->getEmail()
        );

        $lotteryEntity->setStatus($lotteryResponseTransfer->getStatus());
        $lotteryEntity->setDescription($lotteryResponseTransfer->getDescription());
        $lotteryEntity->save();
    }

    /**
     * @param int $idSalesOrder
     *
     * @return bool
     */
    public function isAWinner($idSalesOrder)
    {
        $lotteryEntity = $this->getLotteryEntity($idSalesOrder);

        if (!$lotteryEntity) {
            return false;
        }

        return ($lotteryEntity->getStatus() === self::STATUS_WON);
    }

    /**
     * @param int $idSalesOrder
     *
     * @return \Orm\Zed\Lottery\Persistence\PyzLottery
     */
    protected function getLotteryEntity($idSalesOrder)
    {
        $lotteryEntity = $this->queryContainer->queryLotteryByIdSalesOrder($idSalesOrder)
            ->findOne();

        return $lotteryEntity;
    }

}
