<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductPerformanceResultRankMetrics
{
    public ProductPerformanceResultViewsAndSalesMetrics $overall;
    public array $withinCategories;
    public ProductPerformanceResultViewsAndSalesMetrics $withinBrand;
    public static function create() : ProductPerformanceResultRankMetrics
    {
        $result = new ProductPerformanceResultRankMetrics();
        return $result;
    }
    public static function hydrate(array $arr) : ProductPerformanceResultRankMetrics
    {
        $result = new ProductPerformanceResultRankMetrics();
        if (array_key_exists("overall", $arr))
        {
            $result->overall = ProductPerformanceResultViewsAndSalesMetrics::hydrate($arr["overall"]);
        }
        if (array_key_exists("withinCategories", $arr))
        {
            $result->setinCategories = array();
            foreach($arr["withinCategories"] as &$value)
            {
                array_push($result->setinCategories, ProductPerformanceResultCategoryMetrics::hydrate($value));
            }
        }
        if (array_key_exists("withinBrand", $arr))
        {
            $result->setinBrand = ProductPerformanceResultViewsAndSalesMetrics::hydrate($arr["withinBrand"]);
        }
        return $result;
    }
    function setOverall(ProductPerformanceResultViewsAndSalesMetrics $overall)
    {
        $this->overall = $overall;
        return $this;
    }
    function setWithinCategories(ProductPerformanceResultCategoryMetrics ... $withinCategories)
    {
        $this->setinCategories = $withinCategories;
        return $this;
    }
    function setWithinBrand(ProductPerformanceResultViewsAndSalesMetrics $withinBrand)
    {
        $this->setinBrand = $withinBrand;
        return $this;
    }
}
