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
