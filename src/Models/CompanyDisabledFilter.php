<?php declare(strict_types=1);

namespace Relewise\Models;

class CompanyDisabledFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.CompanyDisabledFilter, Relewise.Client";
    public static function create(bool $negated = false) : CompanyDisabledFilter
    {
        $result = new CompanyDisabledFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : CompanyDisabledFilter
    {
        $result = Filter::hydrateBase(new CompanyDisabledFilter(), $arr);
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
