<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Lottery\Business;

use Pyz\Zed\Lottery\Business\Model\Lottery;
use Pyz\Zed\Lottery\Business\Model\LotteryApi;
use Pyz\Zed\Lottery\LotteryDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\Lottery\Persistence\LotteryQueryContainer getQueryContainer()
 * @method \Pyz\Zed\Lottery\LotteryConfig getConfig()
 */
class LotteryBusinessFactory extends AbstractBusinessFactory
{

    /**
     * @return \Pyz\Zed\Lottery\Business\Model\Lottery
     */
    public function createLotteryModel()
    {
        return new Lottery(
            $this->getQueryContainer(),
            $this->createLotteryApi()
        );
    }

    /**
     * @return \Pyz\Zed\Lottery\Business\Model\LotteryApi
     */
    protected function createLotteryApi()
    {
        return new LotteryApi(
            $this->getGuzzleClient(),
            $this->getConfig()->getApiUrl()
        );
    }

    /**
     * @return \GuzzleHttp\Client
     */
    protected function getGuzzleClient()
    {
        return $this->getProvidedDependency(LotteryDependencyProvider::GUZZLE_CLIENT);
    }

}
