<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\HelloSpryker\Persistence;

use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;
use Orm\Zed\HelloSpryker\Persistence\PyzHelloSprykerQuery;

class HelloSprykerPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\HelloSpryker\Persistence\PyzHelloSprykerQuery
     */
    public function createHelloSprykerQuery()
    {
        $helloSprykerQuery = new PyzHelloSprykerQuery();
        return $helloSprykerQuery;
    }
}
