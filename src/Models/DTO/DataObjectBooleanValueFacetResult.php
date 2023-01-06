<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DataObjectBooleanValueFacetResult extends boolDataObjectValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.DataObjectBooleanValueFacetResult, Relewise.Client";
    public static function create() : DataObjectBooleanValueFacetResult
    {
        $result = new DataObjectBooleanValueFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : DataObjectBooleanValueFacetResult
    {
        $result = boolDataObjectValueFacetResult::hydrateBase(new DataObjectBooleanValueFacetResult(), $arr);
        return $result;
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
