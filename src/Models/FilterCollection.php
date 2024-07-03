<?php declare(strict_types=1);

namespace Relewise\Models;

class FilterCollection
{
    public ?array $items;
    public static function create(Filter ... $filters) : FilterCollection
    {
        $result = new FilterCollection();
        $result->items = $filters;
        return $result;
    }
    public static function hydrate(array $arr) : FilterCollection
    {
        $result = new FilterCollection();
        if (array_key_exists("items", $arr))
        {
            $result->items = array();
            foreach($arr["items"] as &$value)
            {
                array_push($result->items, Filter::hydrate($value));
            }
        }
        return $result;
    }
    function setItems(Filter ... $items)
    {
        $this->items = $items;
        return $this;
    }
    /** @param ?Filter[] $items new value. */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    function addToItems(Filter $items)
    {
        if (!isset($this->items))
        {
            $this->items = array();
        }
        array_push($this->items, $items);
        return $this;
    }
}
