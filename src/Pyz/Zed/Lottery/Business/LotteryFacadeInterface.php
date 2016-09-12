<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Lottery\Business;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

interface LotteryFacadeInterface
{

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\CheckoutResponseTransfer $checkoutResponse
     *
     * @return \Generated\Shared\Transfer\CheckoutResponseTransfer
     */
    public function saveLotteryForOrder(QuoteTransfer $quoteTransfer, CheckoutResponseTransfer $checkoutResponse);

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
