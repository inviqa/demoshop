<?php

namespace Pyz\Zed\Search\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Search\Business\SearchBusinessFactory as SprykerSearchBusinessFactory;

/**
 * @method \Spryker\Zed\Search\SearchConfig getConfig()
 */
class SearchBusinessFactory extends SprykerSearchBusinessFactory
{
    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Spryker\Zed\Search\Business\Model\SearchInstallerInterface
     */
    public function createPageIndexMapInstaller(MessengerInterface $messenger)
    {
        return $this->createIndexMapInstaller($messenger);
    }
}
