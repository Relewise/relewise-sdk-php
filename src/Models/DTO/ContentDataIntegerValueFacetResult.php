<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentDataIntegerValueFacetResult extends intContentDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ContentDataIntegerValueFacetResult, Relewise.Client";
    public static function create() : ContentDataIntegerValueFacetResult
    {
        $result = new ContentDataIntegerValueFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataIntegerValueFacetResult
    {
        $result = intContentDataValueFacetResult::hydrateBase(new ContentDataIntegerValueFacetResult(), $arr);
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
    function withSelected(int ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withAvailable(intAvailableFacetValue ... $available)
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
