<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Oms;

use Pyz\Zed\Lottery\Communication\Plugin\AmIAWinner;
use Pyz\Zed\Lottery\Communication\Plugin\StartLottery;
use \Spryker\Zed\Oms\OmsDependencyProvider as SprykerOmsDependencyProvider;
use Spryker\Zed\Kernel\Container;

class OmsDependencyProvider extends SprykerOmsDependencyProvider
{

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Oms\Communication\Plugin\Oms\Condition\ConditionCollection
     */
    protected function getConditionPlugins(Container $container)
    {
        $conditionsCollection = parent::getConditionPlugins($container);

        // TODO: add the condition

        return $conditionsCollection;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Oms\Communication\Plugin\Oms\Command\CommandCollection
     */
    protected function getCommandPlugins(Container $container)
    {
        $commandsCollection = parent::getCommandPlugins($container);

        // TODO: add the command

        return $commandsCollection;
    }

}
