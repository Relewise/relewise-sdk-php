<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryHasParentFilter extends HasParentCategoryFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductCategoryHasParentFilter, Relewise.Client";
    public static function create() : ProductCategoryHasParentFilter
    {
        $result = new ProductCategoryHasParentFilter();
        $result->negated = false;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryHasParentFilter
    {
        $result = HasParentCategoryFilter::hydrateBase(new ProductCategoryHasParentFilter(), $arr);
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
