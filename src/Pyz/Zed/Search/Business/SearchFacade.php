<?php

namespace Pyz\Zed\Search\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Search\Business\SearchFacade as SprykerSearchFacade;

/**
 * @method \Pyz\Zed\Search\Business\SearchBusinessFactory getFactory()
 */
class SearchFacade extends SprykerSearchFacade
{
    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function generatePageIndexMap(MessengerInterface $messenger)
    {
        $this
            ->getFactory()
            ->createPageIndexMapInstaller($messenger)
            ->install();
    }
}
