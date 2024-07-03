<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentDisabledFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentDisabledFilter, Relewise.Client";
    public static function create(bool $negated = false) : ContentDisabledFilter
    {
        $result = new ContentDisabledFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ContentDisabledFilter
    {
        $result = Filter::hydrateBase(new ContentDisabledFilter(), $arr);
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
