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
    function withSelected(bool ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    function withSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
