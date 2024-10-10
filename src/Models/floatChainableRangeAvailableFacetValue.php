<?php declare(strict_types=1);

namespace Relewise\Models;

class floatChainableRangeAvailableFacetValue
{
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
