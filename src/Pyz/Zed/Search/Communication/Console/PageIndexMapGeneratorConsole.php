<?php

namespace Pyz\Zed\Search\Communication\Console;

use Spryker\Zed\Console\Business\Model\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Pyz\Zed\Search\Business\SearchFacade getFacade()
 */
class PageIndexMapGeneratorConsole extends Console
{
    const COMMAND_NAME = 'setup:generate-pageindexmap';
    const DESCRIPTION = 'This command will generate the PageIndexMap';

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName(self::COMMAND_NAME);
        $this->setDescription(self::DESCRIPTION);

        parent::configure();
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getFacade()->generatePageIndexMap($this->getMessenger());
    }
}
