<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentCategoryDataHasKeyFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentCategoryDataHasKeyFilter, Relewise.Client";
    public string $key;
    public static function create(string $key, bool $negated = false) : ContentCategoryDataHasKeyFilter
    {
        $result = new ContentCategoryDataHasKeyFilter();
        $result->key = $key;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentCategoryDataHasKeyFilter
    {
        $result = Filter::hydrateBase(new ContentCategoryDataHasKeyFilter(), $arr);
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
