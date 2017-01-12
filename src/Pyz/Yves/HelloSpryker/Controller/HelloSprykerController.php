<?php

namespace Pyz\Yves\HelloSpryker\Controller;

use Spryker\Yves\Application\Controller\AbstractController;

/**
 * @method \Pyz\Client\HelloSpryker\HelloSprykerClientInterface getClient()
 */
class HelloSprykerController extends AbstractController
{
    /**
     * @return array
     */
    public function indexAction()
    {

        return [
            'reversedString' => $this->getClient()->getReversedString()
        ];
    }
}
