<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentDataHasKeyFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentDataHasKeyFilter, Relewise.Client";
    public string $key;
    
    public static function create(string $key, bool $negated = false) : ContentDataHasKeyFilter
    {
        $result = new ContentDataHasKeyFilter();
        $result->key = $key;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentDataHasKeyFilter
    {
        $result = Filter::hydrateBase(new ContentDataHasKeyFilter(), $arr);
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
