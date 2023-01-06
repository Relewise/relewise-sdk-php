<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DataObjectDoubleValueFacet extends floatDataObjectValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectDoubleValueFacet, Relewise.Client";
    public static function create() : DataObjectDoubleValueFacet
    {
        $result = new DataObjectDoubleValueFacet();
        return $result;
    }
    public static function hydrate(array $arr) : DataObjectDoubleValueFacet
    {
        $result = floatDataObjectValueFacet::hydrateBase(new DataObjectDoubleValueFacet(), $arr);
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
    function addToSelected(float $selected)
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
