<?php declare(strict_types=1);

namespace Relewise\Models;

/** @deprecated Use ContentDataDoubleValueFacetResult instead */
class ContentDataIntegerValueFacetResult extends intContentDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ContentDataIntegerValueFacetResult, Relewise.Client";
    public static function create(string $key, array $selected, ?CollectionFilterType $collectionFilterType, intAvailableFacetValue ... $available) : ContentDataIntegerValueFacetResult
    {
        $result = new ContentDataIntegerValueFacetResult();
        $result->key = $key;
        $result->selected = $selected;
        $result->collectionFilterType = $collectionFilterType;
        $result->available = $available;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentDataIntegerValueFacetResult
    {
        $result = intContentDataValueFacetResult::hydrateBase(new ContentDataIntegerValueFacetResult(), $arr);
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
    
    function setSelected(int ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    /** @param int[] $selected new value. */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    function addToSelected(int $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    
    function setAvailable(intAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    
    /** @param intAvailableFacetValue[] $available new value. */
    function setAvailableFromArray(array $available)
    {
        $this->available = $available;
        return $this;
    }
    
    function addToAvailable(intAvailableFacetValue $available)
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
