<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentCategoryHasContentsFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentCategoryHasContentsFilter, Relewise.Client";
    
    public static function create(bool $negated) : ContentCategoryHasContentsFilter
    {
        $result = new ContentCategoryHasContentsFilter();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentCategoryHasContentsFilter
    {
        $result = Filter::hydrateBase(new ContentCategoryHasContentsFilter(), $arr);
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
