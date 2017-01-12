<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\HelloSpryker\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Pyz\Zed\HelloSpryker\Business\Model\HelloSpryker;

class HelloSprykerBusinessFactory extends AbstractBusinessFactory
{
    const FACADE_STRING_FORMAT = 'string_format_facade';

    /**
     * @return HelloSpryker
     */
    public function createHelloSpryker()
    {
        return new HelloSpryker(
            $this->getConfig(),
            $this->getQueryContainer(),
            $this->getProvidedDependency(self::FACADE_STRING_FORMAT)
        );
    }
}
