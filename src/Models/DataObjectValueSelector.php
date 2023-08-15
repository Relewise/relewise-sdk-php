<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class DataObjectValueSelector
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.DataObjectValueSelector, Relewise.Client";
    public string $key;
    public ?DataObjectFilter $filter;
    public ?DataObjectValueSelector $childSelector;
    public ?DataObjectValueSelector $fallbackSelector;
    public static function create(string $key) : DataObjectValueSelector
    {
        $result = new DataObjectValueSelector();
        $result->key = $key;
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
    /**
     * Sets key to a new value.
     * @param string $key new value.
     */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    /**
     * Sets filter to a new value.
     * @param ?DataObjectFilter $filter new value.
     */
    function setFilter(?DataObjectFilter $filter)
    {
        $this->filter = $filter;
        return $this;
    }
    /**
     * Sets childSelector to a new value.
     * @param ?DataObjectValueSelector $childSelector new value.
     */
    function setChildSelector(?DataObjectValueSelector $childSelector)
    {
        $this->childSelector = $childSelector;
        return $this;
    }
    /**
     * Sets fallbackSelector to a new value.
     * @param ?DataObjectValueSelector $fallbackSelector new value.
     */
    function setFallbackSelector(?DataObjectValueSelector $fallbackSelector)
    {
        $this->fallbackSelector = $fallbackSelector;
        return $this;
    }
}
