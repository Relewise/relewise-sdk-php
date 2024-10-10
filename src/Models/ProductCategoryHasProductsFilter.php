<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryHasProductsFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductCategoryHasProductsFilter, Relewise.Client";
    
    public static function create(bool $negated) : ProductCategoryHasProductsFilter
    {
        $result = new ProductCategoryHasProductsFilter();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductCategoryHasProductsFilter
    {
        $result = Filter::hydrateBase(new ProductCategoryHasProductsFilter(), $arr);
        return $result;
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
