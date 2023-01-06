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
