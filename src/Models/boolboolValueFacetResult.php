<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class boolboolValueFacetResult extends FacetResult
{
    public string $typeDefinition = "";
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
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.RecentlyPurchasedFacetResult, Relewise.Client")
        {
            return RecentlyPurchasedFacetResult::hydrate($arr);
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
    
    /** @param bool[] $selected new value. */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    function addToSelected(bool $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    
    function setAvailable(boolAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    
    /** @param boolAvailableFacetValue[] $available new value. */
    function setAvailableFromArray(array $available)
    {
        $this->available = $available;
        return $this;
    }
    
    function addToAvailable(boolAvailableFacetValue $available)
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
