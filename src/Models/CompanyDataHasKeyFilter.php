<?php declare(strict_types=1);

namespace Relewise\Models;

class CompanyDataHasKeyFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.CompanyDataHasKeyFilter, Relewise.Client";
    
    public string $key;
    
    public static function create(string $key, bool $negated = false) : CompanyDataHasKeyFilter
    {
        $result = new CompanyDataHasKeyFilter();
        $result->key = $key;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : CompanyDataHasKeyFilter
    {
        $result = Filter::hydrateBase(new CompanyDataHasKeyFilter(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        return $result;
    }
    
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
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
