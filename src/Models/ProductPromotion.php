<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductPromotion extends Promotion
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.ProductPromotion, Relewise.Client";
    /** Filters matching the products to be promoted */
    public ?FilterCollection $filters;
    /** The condition search must match to have ProductPromotion activated. */
    public ?ProductPromotionPromotionConditions $conditions;
    
    public static function create(string $name, ?FilterCollection $filters, ?PromotionLocationCollection $locations) : ProductPromotion
    {
        $result = new ProductPromotion();
        $result->name = $name;
        $result->filters = $filters;
        $result->locations = $locations;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductPromotion
    {
        $result = Promotion::hydrateBase(new ProductPromotion(), $arr);
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        if (array_key_exists("conditions", $arr))
        {
            $result->conditions = ProductPromotionPromotionConditions::hydrate($arr["conditions"]);
        }
        return $result;
    }
    
    /** Filters matching the products to be promoted */
    function setFilters(?FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    /** The condition search must match to have ProductPromotion activated. */
    function setConditions(?ProductPromotionPromotionConditions $conditions)
    {
        $this->conditions = $conditions;
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
