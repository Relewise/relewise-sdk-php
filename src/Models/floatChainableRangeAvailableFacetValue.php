<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class floatChainableRangeAvailableFacetValue
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.AvailableFacetValue`1[[Relewise.Client.DataTypes.ChainableRange`1[[System.Nullable`1[[System.Double, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client, Version=1.61.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public ?floatChainableRange $value;
    public int $hits;
    public bool $selected;
    public static function create(?floatChainableRange $value, bool $selected, int $hits) : floatChainableRangeAvailableFacetValue
    {
        $result = new floatChainableRangeAvailableFacetValue();
        $result->value = $value;
        $result->selected = $selected;
        $result->hits = $hits;
        return $result;
    }
    public static function hydrate(array $arr) : floatChainableRangeAvailableFacetValue
    {
        $result = new floatChainableRangeAvailableFacetValue();
        if (array_key_exists("value", $arr))
        {
            $result->value = floatChainableRange::hydrate($arr["value"]);
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
    function setValue(?floatChainableRange $value)
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
