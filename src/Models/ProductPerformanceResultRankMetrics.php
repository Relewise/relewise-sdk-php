<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductPerformanceResultRankMetrics
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductPerformanceResult+RankMetrics, Relewise.Client";
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
    function setOverall(ProductPerformanceResultViewsAndSalesMetrics $overall)
    {
        $this->overall = $overall;
        return $this;
    }
    function setWithinCategories(ProductPerformanceResultCategoryMetrics ... $withinCategories)
    {
        $this->withinCategories = $withinCategories;
        return $this;
    }
    function setWithinCategoriesFromArray(array $withinCategories)
    {
        $this->withinCategories = $withinCategories;
        return $this;
    }
    function addToWithinCategories(ProductPerformanceResultCategoryMetrics $withinCategories)
    {
        if (!isset($this->withinCategories))
        {
            $this->withinCategories = array();
        }
        array_push($this->withinCategories, $withinCategories);
        return $this;
    }
    function setWithinBrand(ProductPerformanceResultViewsAndSalesMetrics $withinBrand)
    {
        $this->withinBrand = $withinBrand;
        return $this;
    }
}
