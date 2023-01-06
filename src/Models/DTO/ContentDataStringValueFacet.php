<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentDataStringValueFacet extends stringContentDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataStringValueFacet, Relewise.Client";
    public static function create() : ContentDataStringValueFacet
    {
        $result = new ContentDataStringValueFacet();
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataStringValueFacet
    {
        $result = stringContentDataValueFacet::hydrateBase(new ContentDataStringValueFacet(), $arr);
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
    function addToSelected(string $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    function setSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
