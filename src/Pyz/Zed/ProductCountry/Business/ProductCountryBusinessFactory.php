<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\ProductCountry\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Pyz\Zed\ProductCountry\Business\Model\ProductCountryManager;
use Pyz\Zed\ProductCountry\Business\Model\ProductCountryManagerInterface;
use Pyz\Zed\ProductCountry\ProductCountryDependencyProvider;

class ProductCountryBusinessFactory extends AbstractBusinessFactory
{

    /**
     * @return ProductCountryManagerInterface
     */
    public function createProductCountryManager()
    {
        return new ProductCountryManager(
            $this->getProductFacade(),
            $this->getCountryFacade()
        );
    }

    /**
     * @return \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    public function getProductFacade()
    {
        return $this->getProvidedDependency(ProductCountryDependencyProvider::PRODUCT_FACADE);
    }

    /**
     * @return \Spryker\Zed\Country\Business\CountryFacadeInterface
     */
    public function getCountryFacade()
    {
        return $this->getProvidedDependency(ProductCountryDependencyProvider::COUNTRY_FACADE);
    }

}
