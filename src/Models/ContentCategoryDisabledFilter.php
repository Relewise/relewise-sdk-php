<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentCategoryDisabledFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentCategoryDisabledFilter, Relewise.Client";
    public static function create(bool $negated = false) : ContentCategoryDisabledFilter
    {
        $result = new ContentCategoryDisabledFilter();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentCategoryDisabledFilter
    {
        $result = Filter::hydrateBase(new ContentCategoryDisabledFilter(), $arr);
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
