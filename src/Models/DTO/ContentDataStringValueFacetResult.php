<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentDataStringValueFacetResult extends stringContentDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ContentDataStringValueFacetResult, Relewise.Client";
    public static function create() : ContentDataStringValueFacetResult
    {
        $result = new ContentDataStringValueFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataStringValueFacetResult
    {
        $result = stringContentDataValueFacetResult::hydrateBase(new ContentDataStringValueFacetResult(), $arr);
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
