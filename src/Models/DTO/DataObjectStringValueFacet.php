<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DataObjectStringValueFacet extends stringDataObjectValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectStringValueFacet, Relewise.Client";
    public static function create() : DataObjectStringValueFacet
    {
        $result = new DataObjectStringValueFacet();
        return $result;
    }
    public static function hydrate(array $arr) : DataObjectStringValueFacet
    {
        $result = stringDataObjectValueFacet::hydrateBase(new DataObjectStringValueFacet(), $arr);
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
