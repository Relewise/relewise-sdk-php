<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductPromotionPromotionConditions extends RetailMediaConditions
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.ProductPromotion+PromotionConditions, Relewise.Client";
    public ?SearchTermConditionByLanguageCollection $searchTerm;
    public ?RequestFilterCriteria $requestFilters;
    
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
            $result->searchTerm = SearchTermConditionByLanguageCollection::hydrate($arr["searchTerm"]);
        }
        if (array_key_exists("requestFilters", $arr))
        {
            $result->requestFilters = RequestFilterCriteria::hydrate($arr["requestFilters"]);
        }
        return $result;
    }
    
    function setSearchTerm(?SearchTermConditionByLanguageCollection $searchTerm)
    {
        $this->searchTerm = $searchTerm;
        return $this;
    }
    
    function setRequestFilters(?RequestFilterCriteria $requestFilters)
    {
        $this->requestFilters = $requestFilters;
        return $this;
    }
}
