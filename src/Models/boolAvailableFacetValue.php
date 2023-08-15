<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class boolAvailableFacetValue
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.AvailableFacetValue`1[[System.Boolean, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client";
    public bool $value;
    public int $hits;
    public bool $selected;
    public static function create(bool $value, bool $selected, int $hits) : boolAvailableFacetValue
    {
        $result = new boolAvailableFacetValue();
        $result->value = $value;
        $result->selected = $selected;
        $result->hits = $hits;
        return $result;
    }
    public static function hydrate(array $arr) : boolAvailableFacetValue
    {
        $result = new boolAvailableFacetValue();
        if (array_key_exists("value", $arr))
        {
            $result->value = $arr["value"];
        }
        if (array_key_exists("hits", $arr))
        {
            $result->hits = $arr["hits"];
        }
        if (array_key_exists("selected", $arr))
        {
            $result->selected = $arr["selected"];
        }
        return $result;
    }
    /**
     * Sets value to a new value.
     * @param bool $value new value.
     */
    function setValue(bool $value)
    {
        $this->value = $value;
        return $this;
    }
    /**
     * Sets hits to a new value.
     * @param int $hits new value.
     */
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    /**
     * Sets selected to a new value.
     * @param bool $selected new value.
     */
    function setSelected(bool $selected)
    {
        $this->selected = $selected;
        return $this;
    }
}
