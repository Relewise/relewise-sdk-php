<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdPromotion extends Promotion
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.DisplayAdPromotion, Relewise.Client";
    /** Filters matching the products in the search result to allow this promotion to be in play */
    public ?FilterCollection $productFilters;
    /** The condition search must match to have DisplayAdPromotion activated. */
    public ?DisplayAdPromotionPromotionConditions $conditions;
    /** Filters matching the display ads to be promoted */
    public ?FilterCollection $displayAdFilters;
    
    public static function create(string $name, ?FilterCollection $productFilters, ?FilterCollection $displayAdFilters, ?PromotionLocationCollection $locations) : DisplayAdPromotion
    {
        $result = new DisplayAdPromotion();
        $result->name = $name;
        $result->productFilters = $productFilters;
        $result->displayAdFilters = $displayAdFilters;
        $result->locations = $locations;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdPromotion
    {
        $result = Promotion::hydrateBase(new DisplayAdPromotion(), $arr);
        if (array_key_exists("productFilters", $arr))
        {
            $result->productFilters = FilterCollection::hydrate($arr["productFilters"]);
        }
        if (array_key_exists("conditions", $arr))
        {
            $result->conditions = DisplayAdPromotionPromotionConditions::hydrate($arr["conditions"]);
        }
        if (array_key_exists("displayAdFilters", $arr))
        {
            $result->displayAdFilters = FilterCollection::hydrate($arr["displayAdFilters"]);
        }
        return $result;
    }
    
    /** Filters matching the products in the search result to allow this promotion to be in play */
    function setProductFilters(?FilterCollection $productFilters)
    {
        $this->productFilters = $productFilters;
        return $this;
    }
    
    /** The condition search must match to have DisplayAdPromotion activated. */
    function setConditions(?DisplayAdPromotionPromotionConditions $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    
    /** Filters matching the display ads to be promoted */
    function setDisplayAdFilters(?FilterCollection $displayAdFilters)
    {
        $this->displayAdFilters = $displayAdFilters;
        return $this;
    }
    
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    
    function setLocations(?PromotionLocationCollection $locations)
    {
        $this->locations = $locations;
        return $this;
    }
}
