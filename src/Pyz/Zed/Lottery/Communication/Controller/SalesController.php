<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Lottery\Communication\Controller;

use Spryker\Zed\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Lottery\Persistence\LotteryQueryContainer getQueryContainer()
 * @method \Pyz\Zed\Lottery\Business\LotteryFacade getFacade()
 */
class SalesController extends AbstractController
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function listAction(Request $request)
    {
        $orderTransfer = $this->getOrderTransfer($request);
        $lotteryQuery = $this->getQueryContainer()->queryLotteryByIdSalesOrder($orderTransfer->getIdSalesOrder());

        return $this->viewResponse([
            'lottery' => $lotteryQuery->findOne(),
        ]);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Generated\Shared\Transfer\OrderTransfer
     */
    protected function getOrderTransfer(Request $request)
    {
        return $request->request->get('orderTransfer');
    }

}
