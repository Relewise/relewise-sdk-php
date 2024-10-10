<?php declare(strict_types=1);

namespace Relewise\Models;

/** a Filter that can filter on whether the product is present in the cart associated to the User used in this query. */
class ProductInCartFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductInCartFilter, Relewise.Client";
    
    public static function create(bool $negated = false) : ProductInCartFilter
    {
        $result = new ProductInCartFilter();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductInCartFilter
    {
        $result = Filter::hydrateBase(new ProductInCartFilter(), $arr);
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
