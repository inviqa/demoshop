<?php
namespace Pyz\Zed\Sales\Communication\Plugin\Oms\Condition;

use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Condition\ConditionInterface;

class IsInvoiceCreatedCondition implements ConditionInterface
{

    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem $orderItem
     *
     * @return bool
     */
    public function check(SpySalesOrderItem $orderItem)
    {
        $orderEntity = $orderItem->getOrder();

        $path = sprintf('%s/orders/invoice-order-%d', sys_get_temp_dir(), $orderEntity->getIdSalesOrder());

        return is_readable($path);
    }

}
