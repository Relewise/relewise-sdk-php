<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdPromotionPromotionConditions extends RetailMediaConditions
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.DisplayAdPromotion+PromotionConditions, Relewise.Client";
    public ?SearchTermConditionByLanguageCollection $searchTerm;
    public ?RequestFilterCriteria $requestFilters;
    
    public static function create() : DisplayAdPromotionPromotionConditions
    {
        $result = new DisplayAdPromotionPromotionConditions();
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdPromotionPromotionConditions
    {
        $result = RetailMediaConditions::hydrateBase(new DisplayAdPromotionPromotionConditions(), $arr);
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
