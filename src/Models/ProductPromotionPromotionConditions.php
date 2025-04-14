<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductPromotionPromotionConditions extends RetailMediaConditions
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.ProductPromotion+PromotionConditions, Relewise.Client";
    public ?RetailMediaSearchTermConditionCollection $searchTerm;
    
    public static function create() : ProductPromotionPromotionConditions
    {
        $result = new ProductPromotionPromotionConditions();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductPromotionPromotionConditions
    {
        $result = RetailMediaConditions::hydrateBase(new ProductPromotionPromotionConditions(), $arr);
        if (array_key_exists("searchTerm", $arr))
        {
            $result->searchTerm = RetailMediaSearchTermConditionCollection::hydrate($arr["searchTerm"]);
        }
        return $result;
    }
    
    function setSearchTerm(?RetailMediaSearchTermConditionCollection $searchTerm)
    {
        $this->searchTerm = $searchTerm;
        return $this;
    }
}
