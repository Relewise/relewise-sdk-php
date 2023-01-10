<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductPerformanceResultSalesByCurrency
{
    public Currency $currency;
    public int $orders;
    public float $averageSubtotal;
    public float $units;
    public float $revenue;
    public static function create() : ProductPerformanceResultSalesByCurrency
    {
        $result = new ProductPerformanceResultSalesByCurrency();
        return $result;
    }
    public static function hydrate(array $arr) : ProductPerformanceResultSalesByCurrency
    {
        $result = new ProductPerformanceResultSalesByCurrency();
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
        }
        if (array_key_exists("orders", $arr))
        {
            $result->orders = $arr["orders"];
        }
        if (array_key_exists("averageSubtotal", $arr))
        {
            $result->averageSubtotal = $arr["averageSubtotal"];
        }
        if (array_key_exists("units", $arr))
        {
            $result->units = $arr["units"];
        }
        if (array_key_exists("revenue", $arr))
        {
            $result->revenue = $arr["revenue"];
        }
        return $result;
    }
    function setCurrency(Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    function setOrders(int $orders)
    {
        $this->orders = $orders;
        return $this;
    }
    function setAverageSubtotal(float $averageSubtotal)
    {
        $this->averageSubtotal = $averageSubtotal;
        return $this;
    }
    function setUnits(float $units)
    {
        $this->units = $units;
        return $this;
    }
    function setRevenue(float $revenue)
    {
        $this->revenue = $revenue;
        return $this;
    }
}
