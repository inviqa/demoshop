<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\HelloSpryker\Business\Model;

use Spryker\Zed\Kernel\AbstractBundleConfig;
use Spryker\Zed\Kernel\Persistence\QueryContainer\QueryContainerInterface;
use Orm\Zed\HelloSpryker\Persistence\PyzHelloSpryker;
use Pyz\Zed\HelloSpryker\HelloSprykerConfig;
use Pyz\Zed\StringFormat\Business\StringFormatFacade;

class HelloSpryker
{
    /**
     * HelloSprykerConfig extends AbstractBundleConfig
     *
     * @var \Pyz\Zed\HelloSpryker\HelloSprykerConfig
     */
    protected $config;

    /**
     * @var \Pyz\Zed\HelloSpryker\Persistence\HelloSprykerQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @var \Pyz\Zed\StringFormat\Business\StringFormatFacade
     */
    protected $stringFormatFacade;

    /**
     * @param \Spryker\Zed\Kernel\AbstractBundleConfig          $config
     * @param QueryContainerInterface                           $queryContainer
     * @param \Pyz\Zed\StringFormat\Business\StringFormatFacade $stringFormatFacade
     */
    public function __construct(
        AbstractBundleConfig $config,
        QueryContainerInterface $queryContainer,
        StringFormatFacade $stringFormatFacade
    )
    {
        $this->config             = $config;
        $this->queryContainer     = $queryContainer;
        $this->stringFormatFacade = $stringFormatFacade;

        $this->initDatabaseFromConfig($this->config);
    }

    /**
     * @return \Generated\Shared\Transfer\HelloSprykerMessageTransfer
     */
    public function getReversedString()
    {
        $originalString =  $this->queryContainer->queryHelloSpryker()->findOne()->getString();

        /**
         * @var \Generated\Shared\Transfer\HelloSprykerMessageTransfer $helloTransfer
         */
        $helloTransfer  = $this->stringFormatFacade->getReversedString($originalString);

        return $helloTransfer;
    }

    /**
     * @param \Pyz\Zed\HelloSpryker\HelloSprykerConfig $config
     */
    protected function initDatabaseFromConfig(HelloSprykerConfig $config)
    {
        $helloWorldEntity = $this->queryContainer->queryHelloSpryker()->findOne();
        if (!$helloWorldEntity) {
            $helloWorldEntity = new PyzHelloSpryker();
            $helloWorldEntity->setString($config->getString());
        } else {
            $helloWorldEntity->setString($config->getString());
        }
        $helloWorldEntity->save();
    }
}
