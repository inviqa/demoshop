<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Application\Communication\Controller;

use Spryker\Zed\Application\Communication\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        return [
            'myString' => "Project Fabrizio German Shop",
        ];
    }
}
