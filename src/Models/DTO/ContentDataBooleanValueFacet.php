<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentDataBooleanValueFacet extends boolContentDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataBooleanValueFacet, Relewise.Client";
    public static function create() : ContentDataBooleanValueFacet
    {
        $result = new ContentDataBooleanValueFacet();
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataBooleanValueFacet
    {
        $result = boolContentDataValueFacet::hydrateBase(new ContentDataBooleanValueFacet(), $arr);
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
    function addToSelected(bool $selected)
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
