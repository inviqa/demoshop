<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\ProductCountry\Business\Model;

use Orm\Zed\ProductCountry\Persistence\SpyProductAbstractCountry;

class ProductCountryManager implements ProductCountryManagerInterface
{

    /** @var \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade */
    protected $productFacade;

    /** @var \Spryker\Zed\Country\Business\CountryFacadeInterface $countryFacade */
    protected $countryFacade;

    /**
     * ProductCountryManager constructor.
     *
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     * @param \Spryker\Zed\Country\Business\CountryFacadeInterface $countryFacade
     */
    public function __construct($productFacade, $countryFacade)
    {
        $this->productFacade = $productFacade;
        $this->countryFacade = $countryFacade;
    }

    /**
     * @param array $productCountryData Product SKU => Country ISO 2 Code
     *
     * @throws \Exception
     *
     * @return void
     */
    public function importProductCountryData(array $productCountryData)
    {
        foreach ($productCountryData as $productCountrySku => $productCountryIso2Code) {
            $this->saveProductCountryEntity($productCountrySku, $productCountryIso2Code);
        }
    }

    /**
     * @param $productCountrySku
     * @param $productCountryIso2Code
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Exception
     */
    private function saveProductCountryEntity($productCountrySku, $productCountryIso2Code)
    {
        try {
            $productId = $this->productFacade->getProductAbstractIdByConcreteSku($productCountrySku);
            $countryId = $this->countryFacade->getIdCountryByIso2Code($productCountryIso2Code);

            $countryEntity = new SpyProductAbstractCountry();
            $countryEntity->setProductId($productId);
            $countryEntity->setCountryId($countryId);

            $countryEntity->save();

            // Touch product to trigger collector for key/value export
            $this->productFacade->touchProductActive($productId);

        } catch (\Exception $e) {
            throw $e;
        }
    }

}
