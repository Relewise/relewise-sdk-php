<?php declare(strict_types=1);

namespace Relewise\Models;

class LocationPlacementCollection
{
    public array $items;
    public static function create(LocationPlacement ... $placements) : LocationPlacementCollection
    {
        $result = new LocationPlacementCollection();
        $result->items = $placements;
        return $result;
    }
    public static function hydrate(array $arr) : LocationPlacementCollection
    {
        $result = new LocationPlacementCollection();
        if (array_key_exists("items", $arr))
        {
            $result->items = array();
            foreach($arr["items"] as &$value)
            {
                array_push($result->items, LocationPlacement::hydrate($value));
            }
        }
        return $result;
    }
    
    function setItems(LocationPlacement ... $items)
    {
        $this->items = $items;
        return $this;
    }
    
    /** @param LocationPlacement[] $items new value. */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    
    function addToItems(LocationPlacement $items)
    {
        if (!isset($this->items))
        {
            $this->items = array();
        }
        array_push($this->items, $items);
        return $this;
    }
}
