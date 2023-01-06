<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class intAvailableFacetValue
{
    public int $value;
    public int $hits;
    public bool $selected;
    public static function create(int $value, bool $selected, int $hits) : intAvailableFacetValue
    {
        $result = new intAvailableFacetValue();
        $result->value = $value;
        $result->selected = $selected;
        $result->hits = $hits;
        return $result;
    }
    public static function hydrate(array $arr) : intAvailableFacetValue
    {
        $result = new intAvailableFacetValue();
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
    function setValue(int $value)
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
