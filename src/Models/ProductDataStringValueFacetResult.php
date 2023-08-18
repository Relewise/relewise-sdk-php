<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductDataStringValueFacetResult extends stringProductDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductDataStringValueFacetResult, Relewise.Client";
    public static function create(DataSelectionStrategy $dataSelectionStrategy, string $key, array $selected, ?CollectionFilterType $collectionFilterType, stringAvailableFacetValue ... $available) : ProductDataStringValueFacetResult
    {
        $result = new ProductDataStringValueFacetResult();
        $result->dataSelectionStrategy = $dataSelectionStrategy;
        $result->key = $key;
        $result->selected = $selected;
        $result->collectionFilterType = $collectionFilterType;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataStringValueFacetResult
    {
        $result = stringProductDataValueFacetResult::hydrateBase(new ProductDataStringValueFacetResult(), $arr);
        return $result;
    }
    function setDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
        return $this;
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
    function setSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Sets selected to a new value from an array.
     * @param string[] $selected new value.
     */
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
    function setAvailable(stringAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    /**
     * Sets available to a new value from an array.
     * @param stringAvailableFacetValue[] $available new value.
     */
    function setAvailableFromArray(array $available)
    {
        $this->available = $available;
        return $this;
    }
    function addToAvailable(stringAvailableFacetValue $available)
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
