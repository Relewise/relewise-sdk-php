<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentDataDoubleValueFacetResult extends floatContentDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ContentDataDoubleValueFacetResult, Relewise.Client";
    public static function create() : ContentDataDoubleValueFacetResult
    {
        $result = new ContentDataDoubleValueFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataDoubleValueFacetResult
    {
        $result = floatContentDataValueFacetResult::hydrateBase(new ContentDataDoubleValueFacetResult(), $arr);
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
    function setSelected(float ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setAvailable(floatAvailableFacetValue ... $available)
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
