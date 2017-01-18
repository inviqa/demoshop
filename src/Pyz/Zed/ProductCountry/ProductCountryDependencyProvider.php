<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\ProductCountry;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ProductCountryDependencyProvider extends AbstractBundleDependencyProvider
{

    const PRODUCT_FACADE = 'facade product';
    const COUNTRY_FACADE = 'facade country';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[static::PRODUCT_FACADE] = function (Container $container) {
            return $container->getLocator()->product()->facade();
        };

        $container[static::COUNTRY_FACADE] = function (Container $container) {
            return $container->getLocator()->country()->facade();
        };

        return $container;
    }

}
