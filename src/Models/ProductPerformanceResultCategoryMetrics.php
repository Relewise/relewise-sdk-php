<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductPerformanceResultCategoryMetrics
{
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
    
    function setCategory(CategoryNameAndIdResult $category)
    {
        $this->category = $category;
        return $this;
    }
    
    function setImmediateParent(bool $immediateParent)
    {
        $this->immediateParent = $immediateParent;
        return $this;
    }
    
    function setRank(ProductPerformanceResultViewsAndSalesMetrics $rank)
    {
        $this->rank = $rank;
        return $this;
    }
}
