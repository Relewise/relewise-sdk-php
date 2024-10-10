<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentHasCategoriesFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentHasCategoriesFilter, Relewise.Client";
    
    public static function create(bool $negated) : ContentHasCategoriesFilter
    {
        $result = new ContentHasCategoriesFilter();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentHasCategoriesFilter
    {
        $result = Filter::hydrateBase(new ContentHasCategoriesFilter(), $arr);
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
