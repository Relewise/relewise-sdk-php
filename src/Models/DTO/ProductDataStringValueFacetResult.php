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
    function withSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withAvailable(stringAvailableFacetValue ... $available)
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
