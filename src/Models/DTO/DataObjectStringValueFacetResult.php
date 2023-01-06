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
