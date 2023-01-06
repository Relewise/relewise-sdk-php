<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductPerformanceResultSalesWithKnownCartOpenerMetrics
{
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
    function withOrders(int $orders)
    {
        $this->orders = $orders;
        return $this;
    }
    function withOpened(int $opened)
    {
        $this->opened = $opened;
        return $this;
    }
    function withOpenedPercent(float $openedPercent)
    {
        $this->openedPercent = $openedPercent;
        return $this;
    }
}
