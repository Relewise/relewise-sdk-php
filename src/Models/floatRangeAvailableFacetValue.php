<?php declare(strict_types=1);

namespace Relewise\Models;

class floatRangeAvailableFacetValue
{
    public ?floatRange $value;
    public int $hits;
    public bool $selected;
    public static function create(?floatRange $value, bool $selected, int $hits) : floatRangeAvailableFacetValue
    {
        $result = new floatRangeAvailableFacetValue();
        $result->value = $value;
        $result->selected = $selected;
        $result->hits = $hits;
        return $result;
    }
    
    public static function hydrate(array $arr) : floatRangeAvailableFacetValue
    {
        $result = new floatRangeAvailableFacetValue();
        if (array_key_exists("value", $arr))
        {
            $result->value = floatRange::hydrate($arr["value"]);
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
    
    function setValue(?floatRange $value)
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
