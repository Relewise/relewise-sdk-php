<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductDataDoubleValueFacetResult extends floatProductDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductDataDoubleValueFacetResult, Relewise.Client";
    public static function create(DataSelectionStrategy $dataSelectionStrategy, string $key, array $selected, ?CollectionFilterType $collectionFilterType, floatAvailableFacetValue ... $available) : ProductDataDoubleValueFacetResult
    {
        $result = new ProductDataDoubleValueFacetResult();
        $result->dataSelectionStrategy = $dataSelectionStrategy;
        $result->key = $key;
        $result->selected = $selected;
        $result->collectionFilterType = $collectionFilterType;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataDoubleValueFacetResult
    {
        $result = floatProductDataValueFacetResult::hydrateBase(new ProductDataDoubleValueFacetResult(), $arr);
        return $result;
    }
    /**
     * Sets dataSelectionStrategy to a new value.
     * @param DataSelectionStrategy $dataSelectionStrategy new value.
     */
    function setDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
        return $this;
    }
    /**
     * Sets key to a new value.
     * @param string $key new value.
     */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    /**
     * Sets collectionFilterType to a new value.
     * @param ?CollectionFilterType $collectionFilterType new value.
     */
    function setCollectionFilterType(?CollectionFilterType $collectionFilterType)
    {
        $this->collectionFilterType = $collectionFilterType;
        return $this;
    }
    /**
     * Sets selected to a new value.
     * @param float[] $selected new value.
     */
    function setSelected(float ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Sets selected to a new value from an array.
     * @param float[] $selected new value.
     */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Adds a new element to selected.
     * @param float $selected new element.
     */
    function addToSelected(float $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    /**
     * Sets available to a new value.
     * @param floatAvailableFacetValue[] $available new value.
     */
    function setAvailable(floatAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    /**
     * Sets available to a new value from an array.
     * @param floatAvailableFacetValue[] $available new value.
     */
    function setAvailableFromArray(array $available)
    {
        $this->available = $available;
        return $this;
    }
    /**
     * Adds a new element to available.
     * @param floatAvailableFacetValue $available new element.
     */
    function addToAvailable(floatAvailableFacetValue $available)
    {
        if (!isset($this->available))
        {
            $this->available = array();
        }
        array_push($this->available, $available);
        return $this;
    }
    /**
     * Sets field to a new value.
     * @param FacetingField $field new value.
     */
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
