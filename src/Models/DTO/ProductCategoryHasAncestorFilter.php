<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryHasAncestorFilter extends HasAncestorCategoryFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductCategoryHasAncestorFilter, Relewise.Client";
    public static function create() : ProductCategoryHasAncestorFilter
    {
        $result = new ProductCategoryHasAncestorFilter();
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
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
