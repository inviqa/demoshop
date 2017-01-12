<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\HelloSpryker;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\HelloSpryker\HelloSprykerFactory getFactory()
 */
class HelloSprykerClient extends AbstractClient implements HelloSprykerClientInterface
{
    /**
     * @return \Spryker\Shared\Transfer\TransferInterface
     */
    public function getReversedString()
    {
        return $this->getFactory()
            ->createZedStub()
            ->getReversedString();
    }
}
