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
    function addToSelected(int $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    function setAvailable(intAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    function addToAvailable(intAvailableFacetValue $available)
    {
        if (!isset($this->available))
        {
            $this->available = array();
        }
        array_push($this->available, $available);
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
