<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Lottery;

use Pyz\Shared\Lottery\LotteryConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class LotteryConfig extends AbstractBundleConfig
{

    /**
     * @return string
     */
    public function getApiUrl()
    {
        return $this->get(LotteryConstants::API_URL, 'http://coupons-spryker-com.herokuapp.com/hello-spryker.json');
    }

}
