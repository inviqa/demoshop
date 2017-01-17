<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\ProductCountry\Persistence;

use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * @method ProductCountryPersistenceFactory getFactory()
 */
class ProductCountryQueryContainer extends AbstractQueryContainer implements ProductCountryQueryContainerInterface
{

    /**
     * @param int $idProduct
     * @param int $idCountry
     *
     * @return \Orm\Zed\ProductCountry\Persistence\SpyProductAbstractCountryQuery
     */
    public function queryProductCountry($idProduct, $idCountry)
    {
        $query = $this->getFactory()->createProductCountryQuery();

        $query->filterByProductId($idProduct);
        $query->filterByCountryId($idCountry);
        return $query;
    }

}
