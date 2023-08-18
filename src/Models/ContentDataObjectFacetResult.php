<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentDataObjectFacetResult extends DataObjectFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ContentDataObjectFacetResult, Relewise.Client";
    public static function create(string $key, array $items, DataObjectFilter $filter) : ContentDataObjectFacetResult
    {
        $result = new ContentDataObjectFacetResult();
        $result->key = $key;
        $result->items = $items;
        $result->filter = $filter;
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataObjectFacetResult
    {
        $result = new ContentDataObjectFacetResult();
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setItems(FacetResult ... $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Sets items to a new value from an array.
     * @param FacetResult[] $items new value.
     */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Adds a new element to items.
     * @param FacetResult $items new element.
     */
    function addToItems(FacetResult $items)
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
}
