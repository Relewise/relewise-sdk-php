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
    /**
     * Sets overall to a new value.
     * @param ProductPerformanceResultViewsAndSalesMetrics $overall new value.
     */
    function setOverall(ProductPerformanceResultViewsAndSalesMetrics $overall)
    {
        $this->overall = $overall;
        return $this;
    }
    /**
     * Sets withinCategories to a new value.
     * @param ProductPerformanceResultCategoryMetrics[] $withinCategories new value.
     */
    function setWithinCategories(ProductPerformanceResultCategoryMetrics ... $withinCategories)
    {
        $this->withinCategories = $withinCategories;
        return $this;
    }
    /**
     * Sets withinCategories to a new value from an array.
     * @param ProductPerformanceResultCategoryMetrics[] $withinCategories new value.
     */
    function setWithinCategoriesFromArray(array $withinCategories)
    {
        $this->withinCategories = $withinCategories;
        return $this;
    }
    /**
     * Adds a new element to withinCategories.
     * @param ProductPerformanceResultCategoryMetrics $withinCategories new element.
     */
    function addToWithinCategories(ProductPerformanceResultCategoryMetrics $withinCategories)
    {
        if (!isset($this->withinCategories))
        {
            $this->withinCategories = array();
        }
        array_push($this->withinCategories, $withinCategories);
        return $this;
    }
    /**
     * Sets withinBrand to a new value.
     * @param ProductPerformanceResultViewsAndSalesMetrics $withinBrand new value.
     */
    function setWithinBrand(ProductPerformanceResultViewsAndSalesMetrics $withinBrand)
    {
        $this->withinBrand = $withinBrand;
        return $this;
    }
}
