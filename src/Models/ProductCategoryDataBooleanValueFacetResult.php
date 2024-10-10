<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryDataBooleanValueFacetResult extends boolProductCategoryDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryDataBooleanValueFacetResult, Relewise.Client";
    
    public static function create(string $key, array $selected, ?CollectionFilterType $collectionFilterType, boolAvailableFacetValue ... $available) : ProductCategoryDataBooleanValueFacetResult
    {
        $result = new ProductCategoryDataBooleanValueFacetResult();
        $result->key = $key;
        $result->selected = $selected;
        $result->collectionFilterType = $collectionFilterType;
        $result->available = $available;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductCategoryDataBooleanValueFacetResult
    {
        $result = boolProductCategoryDataValueFacetResult::hydrateBase(new ProductCategoryDataBooleanValueFacetResult(), $arr);
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
