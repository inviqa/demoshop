<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Lottery\Business\Model;

interface LotteryApiInterface
{

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     *
     * @return \Generated\Shared\Transfer\LotteryApiResponseTransfer
     */
    public function call($firstName, $lastName, $email);

}
