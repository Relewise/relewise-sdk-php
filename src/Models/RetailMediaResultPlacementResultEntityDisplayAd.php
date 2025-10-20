<?php declare(strict_types=1);

namespace Relewise\Models;

class RetailMediaResultPlacementResultEntityDisplayAd
{
    public DisplayAdResult $result;
    
    public static function create() : RetailMediaResultPlacementResultEntityDisplayAd
    {
        $result = new RetailMediaResultPlacementResultEntityDisplayAd();
        return $result;
    }
    
    public static function hydrate(array $arr) : RetailMediaResultPlacementResultEntityDisplayAd
    {
        $result = new RetailMediaResultPlacementResultEntityDisplayAd();
        if (array_key_exists("result", $arr))
        {
            $result->result = DisplayAdResult::hydrate($arr["result"]);
        }
        return $result;
    }
    
    function setResult(DisplayAdResult $result)
    {
        $this->result = $result;
        return $this;
    }
}
