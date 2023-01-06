<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductDataDoubleValueFacetResult extends floatProductDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductDataDoubleValueFacetResult, Relewise.Client";
    public static function create() : ProductDataDoubleValueFacetResult
    {
        $result = new ProductDataDoubleValueFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataDoubleValueFacetResult
    {
        $result = floatProductDataValueFacetResult::hydrateBase(new ProductDataDoubleValueFacetResult(), $arr);
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
    function setSelected(float ... $selected)
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
