<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductPerformanceResultSalesWithKnownCartOpenerMetrics
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductPerformanceResult+SalesWithKnownCartOpenerMetrics, Relewise.Client";
    public int $orders;
    public int $opened;
    public float $openedPercent;
    public static function create() : ProductPerformanceResultSalesWithKnownCartOpenerMetrics
    {
        $result = new ProductPerformanceResultSalesWithKnownCartOpenerMetrics();
        return $result;
    }
    public static function hydrate(array $arr) : ProductPerformanceResultSalesWithKnownCartOpenerMetrics
    {
        $result = new ProductPerformanceResultSalesWithKnownCartOpenerMetrics();
        if (array_key_exists("orders", $arr))
        {
            $result->orders = $arr["orders"];
        }
        if (array_key_exists("opened", $arr))
        {
            $result->opened = $arr["opened"];
        }
        if (array_key_exists("openedPercent", $arr))
        {
            $result->openedPercent = $arr["openedPercent"];
        }
        return $result;
    }
    /**
     * Sets orders to a new value.
     * @param int $orders new value.
     */
    function setOrders(int $orders)
    {
        $this->orders = $orders;
        return $this;
    }
    /**
     * Sets opened to a new value.
     * @param int $opened new value.
     */
    function setOpened(int $opened)
    {
        $this->opened = $opened;
        return $this;
    }
    /**
     * Sets openedPercent to a new value.
     * @param float $openedPercent new value.
     */
    function setOpenedPercent(float $openedPercent)
    {
        $this->openedPercent = $openedPercent;
        return $this;
    }
}
