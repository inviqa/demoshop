<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\HelloSpryker\Communication\Controller;

use Spryker\Zed\Application\Communication\Controller\AbstractController;

/**
 * @method \Pyz\Zed\HelloSpryker\Business\HelloSprykerFacade getFacade()
 */
class HelloSprykerController extends AbstractController
{
    public function indexAction()
    {
        $reversedTransfer = $this->getFacade()->getReversedString();
        $reversedString   = $reversedTransfer->getValue();

        return [
            'reversedString' => $reversedString,
        ];
    }
}
