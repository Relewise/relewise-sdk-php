<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryHasAncestorFilter extends HasAncestorCategoryFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductCategoryHasAncestorFilter, Relewise.Client";
    public static function create(bool $negated = false) : ProductCategoryHasAncestorFilter
    {
        $result = new ProductCategoryHasAncestorFilter();
        $result->negated = $negated;
        $result->negated = false;
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
}
