<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\ProductCountry\Persistence;

use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;
use Orm\Zed\ProductCountry\Persistence\PyzProductAbstractCountryQuery;

class ProductCountryPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\ProductCountry\Persistence\PyzProductAbstractCountryQuery
     */
    public function createProductCountryQuery()
    {
        $productCountryQuery = new PyzProductAbstractCountryQuery();
        return $productCountryQuery;
    }
}
