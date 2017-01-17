<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\ProductCountry\Business\Model;

interface ProductCountryManagerInterface
{
    /**
     * @param array $productCountryData Product SKU => Country ISO 2 Code
     *
     * @throws \Exception
     *
     * @return void
     */
    public function importProductCountryData(array $productCountryData);

}
