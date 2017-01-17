<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\ProductCountry\Persistence;

interface ProductCountryQueryContainerInterface
{

    /**
     * @param int $idProduct
     * @param int $idCountry
     *
     * @return \Orm\Zed\ProductCountry\Persistence\SpyProductAbstractCountryQuery
     */
    public function queryProductCountry($idProduct, $idCountry);

}
