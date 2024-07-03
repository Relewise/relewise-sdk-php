<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryDisabledFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductCategoryDisabledFilter, Relewise.Client";
    public static function create(bool $negated = false) : ProductCategoryDisabledFilter
    {
        $result = new ProductCategoryDisabledFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDisabledFilter
    {
        $result = Filter::hydrateBase(new ProductCategoryDisabledFilter(), $arr);
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
