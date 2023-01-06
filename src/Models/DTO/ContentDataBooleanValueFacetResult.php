<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentDataBooleanValueFacetResult extends boolContentDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ContentDataBooleanValueFacetResult, Relewise.Client";
    public static function create() : ContentDataBooleanValueFacetResult
    {
        $result = new ContentDataBooleanValueFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataBooleanValueFacetResult
    {
        $result = boolContentDataValueFacetResult::hydrateBase(new ContentDataBooleanValueFacetResult(), $arr);
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
    function setSelected(bool ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setAvailable(boolAvailableFacetValue ... $available)
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
