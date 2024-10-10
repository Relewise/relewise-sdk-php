<?php declare(strict_types=1);

namespace Relewise\Models;

/** Represents a placement within a location in the system where promotions can be shown */
class PromotionLocationPlacement
{
    /** A key which is automatically computed based on the name. This value gets created the first time the placement is saved and cannot be modified in the future. Manually assigning a value to this will have no effect. */
    public string $key;
    
    public static function create(string $key) : PromotionLocationPlacement
    {
        $result = new PromotionLocationPlacement();
        $result->key = $key;
        return $result;
    }
    
    public static function hydrate(array $arr) : PromotionLocationPlacement
    {
        $result = new PromotionLocationPlacement();
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        return $result;
    }
    
    /** A key which is automatically computed based on the name. This value gets created the first time the placement is saved and cannot be modified in the future. Manually assigning a value to this will have no effect. */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
}
