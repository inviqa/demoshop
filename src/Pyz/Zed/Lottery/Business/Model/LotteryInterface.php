<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Lottery\Business\Model;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

interface LotteryInterface
{

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\CheckoutResponseTransfer $checkoutResponseTransfer
     *
     * @return \Generated\Shared\Transfer\CheckoutResponseTransfer
     */
    public function saveOrderData(QuoteTransfer $quoteTransfer, CheckoutResponseTransfer $checkoutResponseTransfer);

    /**
     * @param int $idSalesOrder
     *
     * @return void
     */
    public function startLottery($idSalesOrder);

    /**
     * @param int $idSalesOrder
     *
     * @return bool
     */
    public function isAWinner($idSalesOrder);

}
