<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductPerformanceResultCategoryMetrics
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductPerformanceResult+CategoryMetrics, Relewise.Client";
    public CategoryNameAndIdResult $category;
    public bool $immediateParent;
    public ProductPerformanceResultViewsAndSalesMetrics $rank;
    public static function create() : ProductPerformanceResultCategoryMetrics
    {
        $result = new ProductPerformanceResultCategoryMetrics();
        return $result;
    }
    public static function hydrate(array $arr) : ProductPerformanceResultCategoryMetrics
    {
        $result = new ProductPerformanceResultCategoryMetrics();
        if (array_key_exists("category", $arr))
        {
            $result->category = CategoryNameAndIdResult::hydrate($arr["category"]);
        }
        if (array_key_exists("immediateParent", $arr))
        {
            $result->immediateParent = $arr["immediateParent"];
        }
        if (array_key_exists("rank", $arr))
        {
            $result->rank = ProductPerformanceResultViewsAndSalesMetrics::hydrate($arr["rank"]);
        }
        return $result;
    }
    /**
     * Sets category to a new value.
     * @param CategoryNameAndIdResult $category new value.
     */
    function setCategory(CategoryNameAndIdResult $category)
    {
        $this->category = $category;
        return $this;
    }
    /**
     * Sets immediateParent to a new value.
     * @param bool $immediateParent new value.
     */
    function setImmediateParent(bool $immediateParent)
    {
        $this->immediateParent = $immediateParent;
        return $this;
    }
    /**
     * Sets rank to a new value.
     * @param ProductPerformanceResultViewsAndSalesMetrics $rank new value.
     */
    function setRank(ProductPerformanceResultViewsAndSalesMetrics $rank)
    {
        $this->rank = $rank;
        return $this;
    }
}
