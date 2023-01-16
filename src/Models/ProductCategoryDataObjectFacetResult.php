<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryDataObjectFacetResult extends DataObjectFacetResult
{
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
