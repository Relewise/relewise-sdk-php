<?php declare(strict_types=1);

namespace Relewise\Models;

/** Defines a placement (f.e. 'main zone', or 'power action') to locate promotions for. */
class RetailMediaQueryPlacementSelector
{
    public string $key;
    
    public static function create(string $key) : RetailMediaQueryPlacementSelector
    {
        $result = new RetailMediaQueryPlacementSelector();
        $result->key = $key;
        return $result;
    }
    
    public static function hydrate(array $arr) : RetailMediaQueryPlacementSelector
    {
        $result = new RetailMediaQueryPlacementSelector();
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        return $result;
    }
    
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
}
