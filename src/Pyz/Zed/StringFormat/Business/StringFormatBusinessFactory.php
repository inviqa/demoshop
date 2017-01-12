<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\StringFormat\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Pyz\Zed\StringFormat\Business\Model\StringFormat;

class StringFormatBusinessFactory extends AbstractBusinessFactory
{

    /**
     * @return StringFormat
     */
    public function createStringFormat()
    {
        return new StringFormat();
    }
}
