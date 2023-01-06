<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductPerformanceResultSalesMetrics
{
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
    function withOrders(int $orders)
    {
        $this->orders = $orders;
        return $this;
    }
    function withAverageNoOfLineItems(float $averageNoOfLineItems)
    {
        $this->averageNoOfLineItems = $averageNoOfLineItems;
        return $this;
    }
    function withCurrencies(ProductPerformanceResultSalesByCurrency ... $currencies)
    {
        $this->currencies = $currencies;
        return $this;
    }
    function withWithKnownCartOpener(ProductPerformanceResultSalesWithKnownCartOpenerMetrics $withKnownCartOpener)
    {
        $this->withKnownCartOpener = $withKnownCartOpener;
        return $this;
    }
}
