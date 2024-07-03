<?php declare(strict_types=1);

namespace Relewise\Models;

class DataObjectValueSelector
{
    public string $key;
    public ?DataObjectFilter $filter;
    public ?DataObjectValueSelector $childSelector;
    public ?DataObjectValueSelector $fallbackSelector;
    public static function create(string $key, ?DataObjectFilter $filter, ?DataObjectValueSelector $childSelector, ?DataObjectValueSelector $fallbackSelector) : DataObjectValueSelector
    {
        $result = new DataObjectValueSelector();
        $result->key = $key;
        $result->filter = $filter;
        $result->childSelector = $childSelector;
        $result->fallbackSelector = $fallbackSelector;
        return $result;
    }
    public static function hydrate(array $arr) : DataObjectValueSelector
    {
        $result = new DataObjectValueSelector();
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("filter", $arr))
        {
            $result->filter = DataObjectFilter::hydrate($arr["filter"]);
        }
        if (array_key_exists("childSelector", $arr))
        {
            $result->childSelector = DataObjectValueSelector::hydrate($arr["childSelector"]);
        }
        if (array_key_exists("fallbackSelector", $arr))
        {
            $result->fallbackSelector = DataObjectValueSelector::hydrate($arr["fallbackSelector"]);
        }
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setFilter(?DataObjectFilter $filter)
    {
        $this->filter = $filter;
        return $this;
    }
    function setChildSelector(?DataObjectValueSelector $childSelector)
    {
        $this->childSelector = $childSelector;
        return $this;
    }
    function setFallbackSelector(?DataObjectValueSelector $fallbackSelector)
    {
        $this->fallbackSelector = $fallbackSelector;
        return $this;
    }
}
