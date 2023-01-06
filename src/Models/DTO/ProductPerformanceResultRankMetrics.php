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
            $result->withinCategories = array();
            foreach($arr["withinCategories"] as &$value)
            {
                array_push($result->withinCategories, ProductPerformanceResultCategoryMetrics::hydrate($value));
            }
        }
        if (array_key_exists("withinBrand", $arr))
        {
            $result->withinBrand = ProductPerformanceResultViewsAndSalesMetrics::hydrate($arr["withinBrand"]);
        }
        return $result;
    }
    function withOverall(ProductPerformanceResultViewsAndSalesMetrics $overall)
    {
        $this->overall = $overall;
        return $this;
    }
    function withWithinCategories(ProductPerformanceResultCategoryMetrics ... $withinCategories)
    {
        $this->withinCategories = $withinCategories;
        return $this;
    }
    function withWithinBrand(ProductPerformanceResultViewsAndSalesMetrics $withinBrand)
    {
        $this->withinBrand = $withinBrand;
        return $this;
    }
}
