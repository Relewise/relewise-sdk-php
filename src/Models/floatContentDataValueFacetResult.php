<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class floatContentDataValueFacetResult extends floatDataValueFacetResult
{
    public string $typeDefinition = "";
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.ContentDataDoubleValueFacetResult, Relewise.Client")
        {
            return ContentDataDoubleValueFacetResult::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = floatDataValueFacetResult::hydrateBase($result, $arr);
        return $result;
    }
    
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    function setCollectionFilterType(?CollectionFilterType $collectionFilterType)
    {
        $this->collectionFilterType = $collectionFilterType;
        return $this;
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
