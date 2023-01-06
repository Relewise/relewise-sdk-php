<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryHasChildFilter extends HasChildCategoryFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductCategoryHasChildFilter, Relewise.Client";
    public static function create() : ProductCategoryHasChildFilter
    {
        $result = new ProductCategoryHasChildFilter();
        $result->negated = false;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryHasChildFilter
    {
        $result = HasChildCategoryFilter::hydrateBase(new ProductCategoryHasChildFilter(), $arr);
        return $result;
    }
    function withCategoryIds(string ... $categoryIds)
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}