<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductPerformanceResultSalesMetrics
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductPerformanceResult+SalesMetrics, Relewise.Client";
    public int $orders;
    public float $averageNoOfLineItems;
    public array $currencies;
    public ProductPerformanceResultSalesWithKnownCartOpenerMetrics $withKnownCartOpener;
    public static function create() : ProductPerformanceResultSalesMetrics
    {
        $result = new ProductPerformanceResultSalesMetrics();
        return $result;
    }
    public static function hydrate(array $arr) : ProductPerformanceResultSalesMetrics
    {
        $result = new ProductPerformanceResultSalesMetrics();
        if (array_key_exists("orders", $arr))
        {
            $result->orders = $arr["orders"];
        }
        if (array_key_exists("averageNoOfLineItems", $arr))
        {
            $result->averageNoOfLineItems = $arr["averageNoOfLineItems"];
        }
        if (array_key_exists("currencies", $arr))
        {
            $result->currencies = array();
            foreach($arr["currencies"] as &$value)
            {
                array_push($result->currencies, ProductPerformanceResultSalesByCurrency::hydrate($value));
            }
        }
        if (array_key_exists("withKnownCartOpener", $arr))
        {
            $result->withKnownCartOpener = ProductPerformanceResultSalesWithKnownCartOpenerMetrics::hydrate($arr["withKnownCartOpener"]);
        }
        return $result;
    }
    function setOrders(int $orders)
    {
        $this->orders = $orders;
        return $this;
    }
    function setAverageNoOfLineItems(float $averageNoOfLineItems)
    {
        $this->averageNoOfLineItems = $averageNoOfLineItems;
        return $this;
    }
    function setCurrencies(ProductPerformanceResultSalesByCurrency ... $currencies)
    {
        $this->currencies = $currencies;
        return $this;
    }
    /**
     * Sets currencies to a new value from an array.
     * @param ProductPerformanceResultSalesByCurrency[] $currencies new value.
     */
    function setCurrenciesFromArray(array $currencies)
    {
        $this->currencies = $currencies;
        return $this;
    }
    /**
     * Adds a new element to currencies.
     * @param ProductPerformanceResultSalesByCurrency $currencies new element.
     */
    function addToCurrencies(ProductPerformanceResultSalesByCurrency $currencies)
    {
        if (!isset($this->currencies))
        {
            $this->currencies = array();
        }
        array_push($this->currencies, $currencies);
        return $this;
    }
    function setWithKnownCartOpener(ProductPerformanceResultSalesWithKnownCartOpenerMetrics $withKnownCartOpener)
    {
        $this->withKnownCartOpener = $withKnownCartOpener;
        return $this;
    }
}
