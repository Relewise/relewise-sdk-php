<?php declare(strict_types=1);

namespace Relewise\Models;

class RetailMediaResultPlacementResultEntityProduct
{
    public ProductResult $result;
    public static function create() : RetailMediaResultPlacementResultEntityProduct
    {
        $result = new RetailMediaResultPlacementResultEntityProduct();
        return $result;
    }
    public static function hydrate(array $arr) : RetailMediaResultPlacementResultEntityProduct
    {
        $result = new RetailMediaResultPlacementResultEntityProduct();
        if (array_key_exists("result", $arr))
        {
            $result->result = ProductResult::hydrate($arr["result"]);
        }
        return $result;
    }
    
    function setResult(ProductResult $result)
    {
        $this->result = $result;
        return $this;
    }
}
