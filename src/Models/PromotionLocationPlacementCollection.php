<?php declare(strict_types=1);

namespace Relewise\Models;

class PromotionLocationPlacementCollection
{
    public array $items;
    public static function create(PromotionLocationPlacement ... $placements) : PromotionLocationPlacementCollection
    {
        $result = new PromotionLocationPlacementCollection();
        $result->items = $placements;
        return $result;
    }
    public static function hydrate(array $arr) : PromotionLocationPlacementCollection
    {
        $result = new PromotionLocationPlacementCollection();
        if (array_key_exists("items", $arr))
        {
            $result->items = array();
            foreach($arr["items"] as &$value)
            {
                array_push($result->items, PromotionLocationPlacement::hydrate($value));
            }
        }
        return $result;
    }
    function setItems(PromotionLocationPlacement ... $items)
    {
        $this->items = $items;
        return $this;
    }
    /** @param PromotionLocationPlacement[] $items new value. */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    function addToItems(PromotionLocationPlacement $items)
    {
        if (!isset($this->items))
        {
            $this->items = array();
        }
        array_push($this->items, $items);
        return $this;
    }
}
