<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductDataStringValueFacetResult extends stringProductDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductDataStringValueFacetResult, Relewise.Client";
    public static function create() : ProductDataStringValueFacetResult
    {
        $result = new ProductDataStringValueFacetResult();
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
    function setAvailable(stringAvailableFacetValue ... $available)
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
