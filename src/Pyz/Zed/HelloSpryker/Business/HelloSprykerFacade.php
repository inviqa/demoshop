<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\HelloSpryker\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\HelloSpryker\Business\HelloSprykerBusinessFactory getFactory()
 */
class HelloSprykerFacade extends AbstractFacade
{
    /**
     * @return \Generated\Shared\Transfer\HelloSprykerMessageTransfer
     */
    public function getReversedString()
    {
        return $this->getFactory()
            ->createHelloSpryker()
            ->getReversedString();
    }
}
