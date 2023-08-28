<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryHasChildFilter extends HasChildCategoryFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductCategoryHasChildFilter, Relewise.Client";
    public static function create(bool $negated = false) : ProductCategoryHasChildFilter
    {
        $result = new ProductCategoryHasChildFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryHasChildFilter
    {
        $result = HasChildCategoryFilter::hydrateBase(new ProductCategoryHasChildFilter(), $arr);
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
}
