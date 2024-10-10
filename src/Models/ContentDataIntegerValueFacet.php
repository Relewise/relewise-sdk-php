<?php declare(strict_types=1);

namespace Relewise\Models;

/** @deprecated Use ContentDataDoubleValueFacet instead */
class ContentDataIntegerValueFacet extends intContentDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataIntegerValueFacet, Relewise.Client";
    
    public static function create(string $key, ?array $selected, ?CollectionFilterType $collectionFilterType) : ContentDataIntegerValueFacet
    {
        $result = new ContentDataIntegerValueFacet();
        $result->key = $key;
        $result->selected = $selected;
        $result->collectionFilterType = $collectionFilterType;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentDataIntegerValueFacet
    {
        $result = intContentDataValueFacet::hydrateBase(new ContentDataIntegerValueFacet(), $arr);
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
    
    /** @param ?int[] $selected new value. */
    function setSelectedFromArray(array $selected)
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
