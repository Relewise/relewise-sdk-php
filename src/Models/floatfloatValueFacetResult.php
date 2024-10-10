<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class floatfloatValueFacetResult extends FacetResult
{
    public string $typeDefinition = "";
    public array $selected;
    public array $available;
    
    
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
                array_push($result->available, floatAvailableFacetValue::hydrate($value));
            }
        }
        return $result;
    }
    
    function setSelected(float ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    /** @param float[] $selected new value. */
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
    
    /** @param floatAvailableFacetValue[] $available new value. */
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
