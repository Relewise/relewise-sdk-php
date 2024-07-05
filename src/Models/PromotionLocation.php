<?php declare(strict_types=1);

namespace Relewise\Models;

class PromotionLocation
{
    public string $key;
    public ?PromotionLocationPlacementCollection $placements;
    public static function create(string $key, ?PromotionLocationPlacementCollection $placements = Null) : PromotionLocation
    {
        $result = new PromotionLocation();
        $result->key = $key;
        $result->placements = $placements;
        return $result;
    }
    public static function hydrate(array $arr) : PromotionLocation
    {
        $result = new PromotionLocation();
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("placements", $arr))
        {
            $result->placements = PromotionLocationPlacementCollection::hydrate($arr["placements"]);
        }
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setPlacements(?PromotionLocationPlacementCollection $placements)
    {
        $this->placements = $placements;
        return $this;
    }
}
