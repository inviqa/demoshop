<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Lottery\Business;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\Lottery\Business\LotteryBusinessFactory getFactory()
 */
class LotteryFacade extends AbstractFacade implements LotteryFacadeInterface
{

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\CheckoutResponseTransfer $checkoutResponse
     *
     * @return \Generated\Shared\Transfer\CheckoutResponseTransfer
     */
    public function saveLotteryForOrder(QuoteTransfer $quoteTransfer, CheckoutResponseTransfer $checkoutResponse)
    {
        return $this->getFactory()->createLotteryModel()->saveOrderData($quoteTransfer, $checkoutResponse);
    }

    /**
     * @param int $idSalesOrder
     *
     * @return void
     */
    public function startLottery($idSalesOrder)
    {
        $this->getFactory()->createLotteryModel()->startLottery($idSalesOrder);
    }

    /**
     * @param int $idSalesOrder
     *
     * @return bool
     */
    public function isAWinner($idSalesOrder)
    {
        return $this->getFactory()->createLotteryModel()->isAWinner($idSalesOrder);
    }

}
