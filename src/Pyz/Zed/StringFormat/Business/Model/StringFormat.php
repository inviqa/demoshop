<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\StringFormat\Business\Model;

use Generated\Shared\Transfer\HelloSprykerMessageTransfer;

class StringFormat
{
    /**
     * @param string $originalString
     * @return \Generated\Shared\Transfer\HelloSprykerMessageTransfer
     */
    public function getReversedString($originalString)
    {
        $helloTransfer = new HelloSprykerMessageTransfer();
        $helloTransfer
            ->setValue(strrev($originalString));

        return $helloTransfer;
    }
}
