<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class stringAvailableFacetValue
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.AvailableFacetValue`1[[System.String, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client";
    public string $value;
    public int $hits;
    public bool $selected;
    public static function create(string $value, bool $selected, int $hits) : stringAvailableFacetValue
    {
        $result = new stringAvailableFacetValue();
        $result->value = $value;
        $result->selected = $selected;
        $result->hits = $hits;
        return $result;
    }
    public static function hydrate(array $arr) : stringAvailableFacetValue
    {
        $result = new stringAvailableFacetValue();
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
    function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    function setSelected(bool $selected)
    {
        $this->selected = $selected;
        return $this;
    }
}
