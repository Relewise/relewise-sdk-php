<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductDisabledFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductDisabledFilter, Relewise.Client";
    public static function create(bool $negated = false) : ProductDisabledFilter
    {
        $result = new ProductDisabledFilter();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductDisabledFilter
    {
        $result = Filter::hydrateBase(new ProductDisabledFilter(), $arr);
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
