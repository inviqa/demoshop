<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\HelloSpryker\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \Pyz\Zed\HelloSpryker\Business\HelloSprykerFacade getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     *  @return \Generated\Shared\Transfer\HelloSprykerMessageTransfer
     */
    public function getReversedStringAction()
    {
        return $this->getFacade()->getReversedString();
    }
}
