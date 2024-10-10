<?php declare(strict_types=1);

namespace Relewise\Models;

class Advertiser extends AdvertiserEntityStateAdvertiserMetadataValuesRetailMediaEntity
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.Advertiser, Relewise.Client";
    
    public string $name;
    
    /** Defines what kind of promotions an advertiser is allowed to create, and constraints to what may be promoted. Constraints could as an example be all products belonging to the brand(s) this Advertiser is associated with. If null or empty, an advertiser will not be allowed to make any promotions anywhere, only useful for Advertisers in draft. */
    public ?PromotionSpecificationCollection $allowedPromotions;
    
    /** Defines locations/placements/variations where this advertiser is allowed to make promotions at. If null or empty, an advertiser will not be allowed to make any promotions anywhere, only useful for Advertisers in draft. */
    public ?PromotionLocationCollection $allowedLocations;
    
    public static function create(?string $id, AdvertiserEntityState $state, string $name, ?PromotionSpecificationCollection $allowedPromotions, ?PromotionLocationCollection $allowedLocations) : Advertiser
    {
        $result = new Advertiser();
        $result->id = $id;
        $result->state = $state;
        $result->name = $name;
        $result->allowedPromotions = $allowedPromotions;
        $result->allowedLocations = $allowedLocations;
        return $result;
    }
    
    public static function hydrate(array $arr) : Advertiser
    {
        $result = AdvertiserEntityStateAdvertiserMetadataValuesRetailMediaEntity::hydrateBase(new Advertiser(), $arr);
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("allowedPromotions", $arr))
        {
            $result->allowedPromotions = PromotionSpecificationCollection::hydrate($arr["allowedPromotions"]);
        }
        if (array_key_exists("allowedLocations", $arr))
        {
            $result->allowedLocations = PromotionLocationCollection::hydrate($arr["allowedLocations"]);
        }
        return $result;
    }
    
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    
    /** Defines what kind of promotions an advertiser is allowed to create, and constraints to what may be promoted. Constraints could as an example be all products belonging to the brand(s) this Advertiser is associated with. If null or empty, an advertiser will not be allowed to make any promotions anywhere, only useful for Advertisers in draft. */
    function setAllowedPromotions(?PromotionSpecificationCollection $allowedPromotions)
    {
        $this->allowedPromotions = $allowedPromotions;
        return $this;
    }
    
    /** Defines locations/placements/variations where this advertiser is allowed to make promotions at. If null or empty, an advertiser will not be allowed to make any promotions anywhere, only useful for Advertisers in draft. */
    function setAllowedLocations(?PromotionLocationCollection $allowedLocations)
    {
        $this->allowedLocations = $allowedLocations;
        return $this;
    }
    
    function setState(AdvertiserEntityState $state)
    {
        $this->state = $state;
        return $this;
    }
    
    function setMetadata(AdvertiserMetadataValues $metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }
    
    function setId(?string $id)
    {
        $this->id = $id;
        return $this;
    }
}
