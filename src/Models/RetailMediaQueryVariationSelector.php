<?php declare(strict_types=1);

namespace Relewise\Models;

/** The variation to retrieve the retail media content for, e.g. "Desktop", "Mobile", "Tablet" etc. */
class RetailMediaQueryVariationSelector
{
    public string $key;
    
    public static function create(string $key) : RetailMediaQueryVariationSelector
    {
        $result = new RetailMediaQueryVariationSelector();
        $result->key = $key;
        return $result;
    }
    
    public static function hydrate(array $arr) : RetailMediaQueryVariationSelector
    {
        $result = new RetailMediaQueryVariationSelector();
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
