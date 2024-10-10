<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductHasCategoriesFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductHasCategoriesFilter, Relewise.Client";
    
    public static function create(bool $negated) : ProductHasCategoriesFilter
    {
        $result = new ProductHasCategoriesFilter();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductHasCategoriesFilter
    {
        $result = Filter::hydrateBase(new ProductHasCategoriesFilter(), $arr);
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
