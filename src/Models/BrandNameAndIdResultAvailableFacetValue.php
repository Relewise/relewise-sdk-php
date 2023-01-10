<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class BrandNameAndIdResultAvailableFacetValue
{
    public BrandNameAndIdResult $value;
    public int $hits;
    public bool $selected;
    public static function create(BrandNameAndIdResult $value, bool $selected, int $hits) : BrandNameAndIdResultAvailableFacetValue
    {
        $result = new BrandNameAndIdResultAvailableFacetValue();
        $result->value = $value;
        $result->selected = $selected;
        $result->hits = $hits;
        return $result;
    }
    public static function hydrate(array $arr) : BrandNameAndIdResultAvailableFacetValue
    {
        $result = new BrandNameAndIdResultAvailableFacetValue();
        if (array_key_exists("value", $arr))
        {
            $result->value = BrandNameAndIdResult::hydrate($arr["value"]);
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
    function setValue(BrandNameAndIdResult $value)
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
