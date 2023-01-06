<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DataObjectStringValueFacetResult extends stringDataObjectValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.DataObjectStringValueFacetResult, Relewise.Client";
    public static function create() : DataObjectStringValueFacetResult
    {
        $result = new DataObjectStringValueFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : DataObjectStringValueFacetResult
    {
        $result = stringDataObjectValueFacetResult::hydrateBase(new DataObjectStringValueFacetResult(), $arr);
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
