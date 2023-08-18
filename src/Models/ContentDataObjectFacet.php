<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentDataObjectFacet extends DataObjectFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataObjectFacet, Relewise.Client";
    public static function create(string $key) : ContentDataObjectFacet
    {
        $result = new ContentDataObjectFacet();
        $result->key = $key;
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataObjectFacet
    {
        $result = new ContentDataObjectFacet();
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setItems(Facet ... $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Sets items to a new value from an array.
     * @param Facet[] $items new value.
     */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Adds a new element to items.
     * @param Facet $items new element.
     */
    function addToItems(Facet $items)
    {
        if (!isset($this->items))
        {
            $this->items = array();
        }
        array_push($this->items, $items);
        return $this;
    }
    function setFilter(DataObjectFilter $filter)
    {
        $this->filter = $filter;
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
