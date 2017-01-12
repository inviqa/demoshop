<?php
namespace Pyz\Yves\HelloSpryker\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class HelloSprykerControllerProvider extends AbstractYvesControllerProvider
{
    /**
     * @param \Silex\Application $app
     */
    protected function defineControllers(Application $app) {
        $this->createController('/hello', 'hello', 'HelloSpryker','HelloSpryker');
    }
}
