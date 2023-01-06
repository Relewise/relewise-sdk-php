<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductPerformanceResultClassificationMetrics
{
    public array $combination;
    public ProductPerformanceResultViewsMetrics $views;
    public ProductPerformanceResultSalesMetrics $sales;
    public ProductPerformanceResultCartMetrics $carts;
    public ProductPerformanceResultRankMetrics $rank;
    public static function create() : ProductPerformanceResultClassificationMetrics
    {
        $result = new ProductPerformanceResultClassificationMetrics();
        return $result;
    }
    public static function hydrate(array $arr) : ProductPerformanceResultClassificationMetrics
    {
        $result = new ProductPerformanceResultClassificationMetrics();
        if (array_key_exists("combination", $arr))
        {
            $result->combination = array();
            foreach($arr["combination"] as $key => $value)
            {
                $result->combination[$key] = $value;
            }
        }
        if (array_key_exists("views", $arr))
        {
            $result->views = ProductPerformanceResultViewsMetrics::hydrate($arr["views"]);
        }
        if (array_key_exists("sales", $arr))
        {
            $result->sales = ProductPerformanceResultSalesMetrics::hydrate($arr["sales"]);
        }
        if (array_key_exists("carts", $arr))
        {
            $result->carts = ProductPerformanceResultCartMetrics::hydrate($arr["carts"]);
        }
        if (array_key_exists("rank", $arr))
        {
            $result->rank = ProductPerformanceResultRankMetrics::hydrate($arr["rank"]);
        }
        return $result;
    }
    function withCombination(string $key, string $value)
    {
        if (!isset($this->combination))
        {
            $this->combination = array();
        }
        $this->combination[$key] = $value;
        return $this;
    }
    function withViews(ProductPerformanceResultViewsMetrics $views)
    {
        $this->views = $views;
        return $this;
    }
    function withSales(ProductPerformanceResultSalesMetrics $sales)
    {
        $this->sales = $sales;
        return $this;
    }
    function withCarts(ProductPerformanceResultCartMetrics $carts)
    {
        $this->carts = $carts;
        return $this;
    }
    function withRank(ProductPerformanceResultRankMetrics $rank)
    {
        $this->rank = $rank;
        return $this;
    }
}
