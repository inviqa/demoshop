<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\HelloSpryker\Zed;

interface HelloSprykerStubInterface
{
    /**
     * @return \Spryker\Shared\Transfer\TransferInterface
     */
    public function getReversedString();
}
