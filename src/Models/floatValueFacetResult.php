<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class floatValueFacetResult extends floatfloatValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ValueFacetResult`1[[System.Double, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.ContentDataDoubleValueFacetResult, Relewise.Client")
        {
            return ContentDataDoubleValueFacetResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.DataObjectDoubleValueFacetResult, Relewise.Client")
        {
            return DataObjectDoubleValueFacetResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryDataDoubleValueFacetResult, Relewise.Client")
        {
            return ProductCategoryDataDoubleValueFacetResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.ProductDataDoubleValueFacetResult, Relewise.Client")
        {
            return ProductDataDoubleValueFacetResult::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = floatfloatValueFacetResult::hydrateBase($result, $arr);
        return $result;
    }
    function setSelected(float ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function addToSelected(float $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    function setAvailable(floatAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    function setAvailableFromArray(array $available)
    {
        $this->available = $available;
        return $this;
    }
    function addToAvailable(floatAvailableFacetValue $available)
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
