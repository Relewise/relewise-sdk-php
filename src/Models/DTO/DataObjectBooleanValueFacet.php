<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DataObjectBooleanValueFacet extends boolDataObjectValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectBooleanValueFacet, Relewise.Client";
    public static function create() : DataObjectBooleanValueFacet
    {
        $result = new DataObjectBooleanValueFacet();
        return $result;
    }
    public static function hydrate(array $arr) : DataObjectBooleanValueFacet
    {
        $result = boolDataObjectValueFacet::hydrateBase(new DataObjectBooleanValueFacet(), $arr);
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
