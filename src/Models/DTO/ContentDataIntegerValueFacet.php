<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentDataIntegerValueFacet extends intContentDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataIntegerValueFacet, Relewise.Client";
    public static function create() : ContentDataIntegerValueFacet
    {
        $result = new ContentDataIntegerValueFacet();
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataIntegerValueFacet
    {
        $result = intContentDataValueFacet::hydrateBase(new ContentDataIntegerValueFacet(), $arr);
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
