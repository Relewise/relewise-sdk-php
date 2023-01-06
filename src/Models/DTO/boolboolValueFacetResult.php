<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class boolboolValueFacetResult extends FacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ValueFacetResult`2[[System.Boolean, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e],[System.Boolean, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client";
    public array $selected;
    public array $available;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.ContentDataBooleanValueFacetResult, Relewise.Client")
        {
            return ContentDataBooleanValueFacetResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.DataObjectBooleanValueFacetResult, Relewise.Client")
        {
            return DataObjectBooleanValueFacetResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryDataBooleanValueFacetResult, Relewise.Client")
        {
            return ProductCategoryDataBooleanValueFacetResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.ProductDataBooleanValueFacetResult, Relewise.Client")
        {
            return ProductDataBooleanValueFacetResult::hydrate($arr);
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
                array_push($result->available, boolAvailableFacetValue::hydrate($value));
            }
        }
        return $result;
    }
    function setSelected(bool ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setAvailable(boolAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
