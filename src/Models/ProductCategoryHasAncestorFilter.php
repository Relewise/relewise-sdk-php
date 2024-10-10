<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryHasAncestorFilter extends HasAncestorCategoryFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductCategoryHasAncestorFilter, Relewise.Client";
    public static function create(bool $negated = false) : ProductCategoryHasAncestorFilter
    {
        $result = new ProductCategoryHasAncestorFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryHasAncestorFilter
    {
        $result = HasAncestorCategoryFilter::hydrateBase(new ProductCategoryHasAncestorFilter(), $arr);
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
