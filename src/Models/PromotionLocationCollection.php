<?php declare(strict_types=1);

namespace Relewise\Models;

class PromotionLocationCollection
{
    public array $items;
    
    public static function create(PromotionLocation ... $placements) : PromotionLocationCollection
    {
        $result = new PromotionLocationCollection();
        $result->items = $placements;
        return $result;
    }
    
    public static function hydrate(array $arr) : PromotionLocationCollection
    {
        $result = new PromotionLocationCollection();
        if (array_key_exists("items", $arr))
        {
            $result->items = array();
            foreach($arr["items"] as &$value)
            {
                array_push($result->items, PromotionLocation::hydrate($value));
            }
        }
        return $result;
    }
    
    function setItems(PromotionLocation ... $items)
    {
        $this->items = $items;
        return $this;
    }
    
    /** @param PromotionLocation[] $items new value. */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    
    function addToItems(PromotionLocation $items)
    {
        if (!isset($this->items))
        {
            $this->items = array();
        }
        array_push($this->items, $items);
        return $this;
    }
}
