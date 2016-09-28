<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Lottery\Persistence;

use Orm\Zed\Lottery\Persistence\PyzLotteryQuery;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

class LotteryQueryContainer extends AbstractQueryContainer implements LotteryQueryContainerInterface
{

    /**
     * @param int $idSalesOrder
     *
     * @return \Orm\Zed\Lottery\Persistence\PyzLotteryQuery
     */
    public function queryLotteryByIdSalesOrder($idSalesOrder)
    {
        $lotteryQuery = $this->createLotteryQuery();
        $lotteryQuery->filterByFkSalesOrder($idSalesOrder);

        return $lotteryQuery;
    }

    /**
     * @param string $email
     *
     * @return \Orm\Zed\Lottery\Persistence\PyzLotteryQuery
     */
    public function queryLotteryByEmail($email)
    {
        $lotteryQuery = $this->createLotteryQuery();
        $lotteryQuery->filterByEmail($email);

        return $lotteryQuery;
    }

    /**
     * @return \Orm\Zed\Lottery\Persistence\PyzLotteryQuery
     */
    protected function createLotteryQuery()
    {
        return PyzLotteryQuery::create();
    }

}
