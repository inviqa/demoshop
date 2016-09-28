<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Lottery\Persistence;

interface LotteryQueryContainerInterface
{

    /**
     * @param int $idSalesOrder
     *
     * @return \Orm\Zed\Lottery\Persistence\PyzLotteryQuery
     */
    public function queryLotteryByIdSalesOrder($idSalesOrder);

    /**
     * @param string $email
     *
     * @return \Orm\Zed\Lottery\Persistence\PyzLotteryQuery
     */
    public function queryLotteryByEmail($email);

}
