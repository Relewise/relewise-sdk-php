<?php declare(strict_types=1);

namespace Relewise\Models;

class LocationPlacementVariationCollection
{
    public array $items;
    public static function create(LocationPlacementVariation ... $variations) : LocationPlacementVariationCollection
    {
        $result = new LocationPlacementVariationCollection();
        $result->items = $variations;
        return $result;
    }
    public static function hydrate(array $arr) : LocationPlacementVariationCollection
    {
        $result = new LocationPlacementVariationCollection();
        if (array_key_exists("items", $arr))
        {
            $result->items = array();
            foreach($arr["items"] as &$value)
            {
                array_push($result->items, LocationPlacementVariation::hydrate($value));
            }
        }
        return $result;
    }
    function setItems(LocationPlacementVariation ... $items)
    {
        $this->items = $items;
        return $this;
    }
    /** @param LocationPlacementVariation[] $items new value. */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    function addToItems(LocationPlacementVariation $items)
    {
        if (!isset($this->items))
        {
            $this->items = array();
        }
        array_push($this->items, $items);
        return $this;
    }
}
