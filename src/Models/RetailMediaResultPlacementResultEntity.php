<?php declare(strict_types=1);

namespace Relewise\Models;

class RetailMediaResultPlacementResultEntity
{
    public ?RetailMediaResultPlacementResultEntityProduct $promotedProduct;
    public ?RetailMediaResultPlacementResultEntityDisplayAd $promotedDisplayAd;
    
    public static function create() : RetailMediaResultPlacementResultEntity
    {
        $result = new RetailMediaResultPlacementResultEntity();
        return $result;
    }
    
    public static function hydrate(array $arr) : RetailMediaResultPlacementResultEntity
    {
        $result = new RetailMediaResultPlacementResultEntity();
        if (array_key_exists("promotedProduct", $arr))
        {
            $result->promotedProduct = RetailMediaResultPlacementResultEntityProduct::hydrate($arr["promotedProduct"]);
        }
        if (array_key_exists("promotedDisplayAd", $arr))
        {
            $result->promotedDisplayAd = RetailMediaResultPlacementResultEntityDisplayAd::hydrate($arr["promotedDisplayAd"]);
        }
        return $result;
    }
    
    function setPromotedProduct(?RetailMediaResultPlacementResultEntityProduct $promotedProduct)
    {
        $this->promotedProduct = $promotedProduct;
        return $this;
    }
    
    function setPromotedDisplayAd(?RetailMediaResultPlacementResultEntityDisplayAd $promotedDisplayAd)
    {
        $this->promotedDisplayAd = $promotedDisplayAd;
        return $this;
    }
}
