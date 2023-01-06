<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductDataIntegerValueFacetResult extends intProductDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductDataIntegerValueFacetResult, Relewise.Client";
    public static function create() : ProductDataIntegerValueFacetResult
    {
        $result = new ProductDataIntegerValueFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataIntegerValueFacetResult
    {
        $result = intProductDataValueFacetResult::hydrateBase(new ProductDataIntegerValueFacetResult(), $arr);
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
    function setSelected(int ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setAvailable(intAvailableFacetValue ... $available)
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
