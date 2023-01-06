<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductDataBooleanValueFacetResult extends boolProductDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductDataBooleanValueFacetResult, Relewise.Client";
    public static function create() : ProductDataBooleanValueFacetResult
    {
        $result = new ProductDataBooleanValueFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataBooleanValueFacetResult
    {
        $result = boolProductDataValueFacetResult::hydrateBase(new ProductDataBooleanValueFacetResult(), $arr);
        return $result;
    }
    function withDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
        return $this;
    }
    function withKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function withCollectionFilterType(?CollectionFilterType $collectionFilterType)
    {
        $this->collectionFilterType = $collectionFilterType;
        return $this;
    }
    function withSelected(bool ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withAvailable(boolAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    function withField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
