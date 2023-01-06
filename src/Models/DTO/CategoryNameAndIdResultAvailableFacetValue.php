<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class CategoryNameAndIdResultAvailableFacetValue
{
    public CategoryNameAndIdResult $value;
    public int $hits;
    public bool $selected;
    public static function create(CategoryNameAndIdResult $value, bool $selected, int $hits) : CategoryNameAndIdResultAvailableFacetValue
    {
        $result = new CategoryNameAndIdResultAvailableFacetValue();
        $result->value = $value;
        $result->selected = $selected;
        $result->hits = $hits;
        return $result;
    }
    public static function hydrate(array $arr) : CategoryNameAndIdResultAvailableFacetValue
    {
        $result = new CategoryNameAndIdResultAvailableFacetValue();
        if (array_key_exists("value", $arr))
        {
            $result->value = CategoryNameAndIdResult::hydrate($arr["value"]);
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
    function withValue(CategoryNameAndIdResult $value)
    {
        $this->value = $value;
        return $this;
    }
    function withHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    function withSelected(bool $selected)
    {
        $this->selected = $selected;
        return $this;
    }
}
