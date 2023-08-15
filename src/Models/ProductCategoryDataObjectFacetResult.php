<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryDataObjectFacetResult extends DataObjectFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryDataObjectFacetResult, Relewise.Client";
    public static function create(string $key, array $items, DataObjectFilter $filter) : ProductCategoryDataObjectFacetResult
    {
        $result = new ProductCategoryDataObjectFacetResult();
        $result->key = $key;
        $result->items = $items;
        $result->filter = $filter;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDataObjectFacetResult
    {
        $result = new ProductCategoryDataObjectFacetResult();
        return $result;
    }
    /**
     * Sets key to a new value.
     * @param string $key new value.
     */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    /**
     * Sets items to a new value.
     * @param FacetResult[] $items new value.
     */
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
    /**
     * Sets filter to a new value.
     * @param DataObjectFilter $filter new value.
     */
    function setFilter(DataObjectFilter $filter)
    {
        $this->filter = $filter;
        return $this;
    }
    /**
     * Sets field to a new value.
     * @param FacetingField $field new value.
     */
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
