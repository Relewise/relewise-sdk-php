<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class stringBrandNameAndIdResultValueFacetResult extends FacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ValueFacetResult`2[[System.String, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e],[Relewise.Client.DataTypes.BrandNameAndIdResult, Relewise.Client, Version=1.61.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public array $selected;
    public array $available;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.BrandFacetResult, Relewise.Client")
        {
            return BrandFacetResult::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = FacetResult::hydrateBase($result, $arr);
        if (array_key_exists("selected", $arr))
        {
            $result->selected = array();
            foreach($arr["selected"] as &$value)
            {
                array_push($result->selected, $value);
            }
        }
        if (array_key_exists("available", $arr))
        {
            $result->available = array();
            foreach($arr["available"] as &$value)
            {
                array_push($result->available, BrandNameAndIdResultAvailableFacetValue::hydrate($value));
            }
        }
        return $result;
    }
    function setSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function addToSelected(string $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    function setAvailable(BrandNameAndIdResultAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    function setAvailableFromArray(array $available)
    {
        $this->available = $available;
        return $this;
    }
    function addToAvailable(BrandNameAndIdResultAvailableFacetValue $available)
    {
        if (!isset($this->available))
        {
            $this->available = array();
        }
        array_push($this->available, $available);
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
