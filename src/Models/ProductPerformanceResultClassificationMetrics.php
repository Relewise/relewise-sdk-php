<?php declare(strict_types=1);

namespace Relewise\Models;

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
    function addToCombination(string $key, string $value)
    {
        if (!isset($this->combination))
        {
            $this->combination = array();
        }
        $this->combination[$key] = $value;
        return $this;
    }
    function setCombinationFromAssociativeArray(array $combination)
    {
        $this->combination = $combination;
        return $this;
    }
    function setViews(ProductPerformanceResultViewsMetrics $views)
    {
        $this->views = $views;
        return $this;
    }
    function setSales(ProductPerformanceResultSalesMetrics $sales)
    {
        $this->sales = $sales;
        return $this;
    }
    function setCarts(ProductPerformanceResultCartMetrics $carts)
    {
        $this->carts = $carts;
        return $this;
    }
    function setRank(ProductPerformanceResultRankMetrics $rank)
    {
        $this->rank = $rank;
        return $this;
    }
}
