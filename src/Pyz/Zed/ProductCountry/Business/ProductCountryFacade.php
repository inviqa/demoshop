<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\ProductCountry\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method ProductCountryBusinessFactory getFactory()
 */
class ProductCountryFacade extends AbstractFacade
{
    /**
     * @param array $productCountryData Product SKU => Country ISO 2 Code
     *
     * @return void
     */
    public function importProductCountryData(array $productCountryData)
    {
        $this->getFactory()->createProductCountryManager()->importProductCountryData($productCountryData);
    }

}
