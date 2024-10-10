<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductPromotion extends Promotion
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.ProductPromotion, Relewise.Client";
    /** Filters matching the products to be promoted */
    public ?FilterCollection $filters;
    
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
        return $result;
    }
    
    /** Filters matching the products to be promoted */
    function setFilters(?FilterCollection $filters)
    {
        $this->filters = $filters;
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
