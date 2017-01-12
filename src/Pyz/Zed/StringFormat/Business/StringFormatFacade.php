<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\StringFormat\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\StringFormat\Business\StringFormatBusinessFactory getFactory()
 */
class StringFormatFacade extends AbstractFacade
{
    /**
     * @param string $originalString
     * @return \Generated\Shared\Transfer\HelloSprykerMessageTransfer
     */
    public function getReversedString($originalString)
    {
        return $this->getFactory()
            ->createStringFormat()
            ->getReversedString($originalString);
    }
}
