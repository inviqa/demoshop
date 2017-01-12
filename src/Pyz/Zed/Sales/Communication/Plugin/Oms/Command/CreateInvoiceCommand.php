<?php
namespace Pyz\Zed\Sales\Communication\Plugin\Oms\Command;

use Orm\Zed\Sales\Persistence\SpySalesOrder;
use RuntimeException;
use Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\CommandByOrderInterface;

class CreateInvoiceCommand implements CommandByOrderInterface
{

    /**
     * Create Invoice
     *
     * @param array $orderItems
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $orderEntity
     * @param \Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject $data
     *
     * @throws \RuntimeException
     *
     * @return array
     */
    public function run(array $orderItems, SpySalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        /* create a fake invoice file */

        $base = sys_get_temp_dir();
        if (!strlen($base)) {
            throw new RuntimeException('Unable to obtain order base store folder (faked in tempdir)');
        }

        $dir = sprintf('%s/orders', $base);
        if (!is_readable($dir) && !mkdir($dir)) {
            throw new RuntimeException('Unable to establish order store folder');
        }

        $path = sprintf('%s/invoice-order-%d', $dir, $orderEntity->getIdSalesOrder());

        touch($path);

        return [];
    }

}
