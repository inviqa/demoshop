<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\ProductCountry\Communication\Controller;

use Spryker\Zed\Application\Communication\Controller\AbstractController;

/**
 * @method \Pyz\Zed\ProductCountry\Business\ProductCountryFacade getFacade()
 */
class ImportController extends AbstractController
{
    public function indexAction()
    {
        $productCountryData = [
            // 'sku' => 'language' (Country ISO 2 Code)
            '001_25904006' => 'IT',
//            '002' => 'DE',
//            '003' => 'CN',
        ];

        try {
            $this->getFacade()->importProductCountryData($productCountryData);
        } catch (\Exception $e) {
            return [
                'responseMessage' => $e->getMessage(),
            ];
        }
        return [
            'responseMessage' => 'Import Sucessful',
        ];
    }
}
