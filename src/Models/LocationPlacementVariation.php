<?php declare(strict_types=1);

namespace Relewise\Models;

class LocationPlacementVariation
{
    public string $name;
    public ?string $key;
    public ?PromotionSpecificationVariationCollection $supportedPromotions;
    
    public static function create(string $name, ?PromotionSpecificationVariationCollection $supportedPromotions) : LocationPlacementVariation
    {
        $result = new LocationPlacementVariation();
        $result->name = $name;
        $result->supportedPromotions = $supportedPromotions;
        return $result;
    }
    
    public static function hydrate(array $arr) : LocationPlacementVariation
    {
        $result = new LocationPlacementVariation();
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("supportedPromotions", $arr))
        {
            $result->supportedPromotions = PromotionSpecificationVariationCollection::hydrate($arr["supportedPromotions"]);
        }
        return $result;
    }
    
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    
    function setKey(?string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    function setSupportedPromotions(?PromotionSpecificationVariationCollection $supportedPromotions)
    {
        $this->supportedPromotions = $supportedPromotions;
        return $this;
    }
}
