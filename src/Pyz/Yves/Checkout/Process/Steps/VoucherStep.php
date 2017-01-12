<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Spryker\Shared\Transfer\AbstractTransfer;
use Symfony\Component\HttpFoundation\Request;
use Generated\Shared\Transfer\DiscountTransfer;
use Spryker\Client\Calculation\CalculationClientInterface;

class VoucherStep extends AbstractBaseStep
{

    /**
     * @var \Spryker\Client\Calculation\CalculationClientInterface|\Spryker\Client\Kernel\AbstractClient
     */
    protected $calculationClient;

    /**
     * @param \Spryker\Client\Calculation\CalculationClientInterface $calculationClient
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(
        CalculationClientInterface $calculationClient,
        $stepRoute,
        $escapeRoute
    ) {
        parent::__construct($stepRoute, $escapeRoute);

        $this->calculationClient = $calculationClient;
    }

    /**
     * @param \Spryker\Shared\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(AbstractTransfer $quoteTransfer)
    {
        return true;
    }

    /**
     * @param \Spryker\Shared\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer)
    {
        return true;
    }

    /**
     * @param \Spryker\Shared\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return array
     */
    public function getTemplateVariables(AbstractTransfer $quoteTransfer)
    {
        return [
            'quoteTransfer' => $quoteTransfer
        ];
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Spryker\Shared\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Spryker\Shared\Transfer\AbstractTransfer
     */
    public function execute(Request $request, AbstractTransfer $quoteTransfer)
    {
        $voucherDiscount = new DiscountTransfer();
        $voucherDiscount->setVoucherCode($quoteTransfer->getVoucher());
        $quoteTransfer->addVoucherDiscount($voucherDiscount);

        return $this->calculationClient->recalculate($quoteTransfer);
    }
}
