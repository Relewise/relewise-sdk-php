<?php declare(strict_types=1);

namespace Relewise\Models;

/** Represents a placement within a location in the system where promotions can be shown */
class PromotionLocationPlacement
{
    /** A key which is automatically computed based on the name. This value gets created the first time the placement is saved and cannot be modified in the future. Manually assigning a value to this will have no effect. */
    public string $key;
    /** The minimum relevancy required by this Placement for results to be promoted. */
    public ?ScoreThresholds $thresholds;
    
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
        if (array_key_exists("thresholds", $arr))
        {
            $result->thresholds = ScoreThresholds::hydrate($arr["thresholds"]);
        }
        return $result;
    }
    
    /** A key which is automatically computed based on the name. This value gets created the first time the placement is saved and cannot be modified in the future. Manually assigning a value to this will have no effect. */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    /** The minimum relevancy required by this Placement for results to be promoted. */
    function setThresholds(?ScoreThresholds $thresholds)
    {
        $this->thresholds = $thresholds;
        return $this;
    }
}
