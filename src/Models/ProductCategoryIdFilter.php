<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryIdFilter extends CategoryIdFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductCategoryIdFilter, Relewise.Client";
    
    public static function create(CategoryScope $evaluationScope, bool $negated = false) : ProductCategoryIdFilter
    {
        $result = new ProductCategoryIdFilter();
        $result->evaluationScope = $evaluationScope;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductCategoryIdFilter
    {
        $result = CategoryIdFilter::hydrateBase(new ProductCategoryIdFilter(), $arr);
        return $result;
    }
    
    function setCategoryIds(string ... $categoryIds)
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }
    
    /** @param string[] $categoryIds new value. */
    function setCategoryIdsFromArray(array $categoryIds)
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }
    
    function addToCategoryIds(string $categoryIds)
    {
        if (!isset($this->categoryIds))
        {
            $this->categoryIds = array();
        }
        array_push($this->categoryIds, $categoryIds);
        return $this;
    }
    
    function setEvaluationScope(CategoryScope $evaluationScope)
    {
        $this->evaluationScope = $evaluationScope;
        return $this;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    
    function setSettings(?FilterSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
