<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class CategoryNameAndIdResultAvailableFacetValue
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.AvailableFacetValue`1[[Relewise.Client.DataTypes.CategoryNameAndIdResult, Relewise.Client, Version=1.61.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
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
    /**
     * Sets value to a new value.
     * @param CategoryNameAndIdResult $value new value.
     */
    function setValue(CategoryNameAndIdResult $value)
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
