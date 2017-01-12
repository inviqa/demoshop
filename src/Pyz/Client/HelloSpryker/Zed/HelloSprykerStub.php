<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\HelloSpryker\Zed;

use Generated\Shared\Transfer\HelloSprykerMessageTransfer;
use Spryker\Client\ZedRequest\Stub\BaseStub;

class HelloSprykerStub extends BaseStub implements HelloSprykerStubInterface
{
    /**
     * @return \Spryker\Shared\Transfer\TransferInterface
     */
    public function getReversedString()
    {
        return $this->zedStub->call(
            '/hello-spryker/gateway/get-reversed-string',
            new HelloSprykerMessageTransfer()
        );
    }
}
