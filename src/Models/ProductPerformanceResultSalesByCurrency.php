<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductPerformanceResultSalesByCurrency
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductPerformanceResult+SalesByCurrency, Relewise.Client";
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
    /**
     * Sets currency to a new value.
     * @param Currency $currency new value.
     */
    function setCurrency(Currency $currency)
    {
        $this->currency = $currency;
        return $this;
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
     * Sets averageSubtotal to a new value.
     * @param float $averageSubtotal new value.
     */
    function setAverageSubtotal(float $averageSubtotal)
    {
        $this->averageSubtotal = $averageSubtotal;
        return $this;
    }
    /**
     * Sets units to a new value.
     * @param float $units new value.
     */
    function setUnits(float $units)
    {
        $this->units = $units;
        return $this;
    }
    /**
     * Sets revenue to a new value.
     * @param float $revenue new value.
     */
    function setRevenue(float $revenue)
    {
        $this->revenue = $revenue;
        return $this;
    }
}
