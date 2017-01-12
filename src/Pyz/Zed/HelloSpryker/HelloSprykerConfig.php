<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\HelloSpryker;

use Spryker\Zed\Kernel\AbstractBundleConfig;
use Pyz\Shared\HelloSpryker\HelloSprykerConstants;

class HelloSprykerConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getString()
    {
        return $this->get(HelloSprykerConstants::STRING, 'Hello Spryker!');
    }
}
