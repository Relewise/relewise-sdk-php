<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchTermModifierRulesRequestSortBySorting
{
    public SearchTermModifierRulesRequestSortBy $sortBy;
    public SortOrder $sortOrder;
    
    public static function create(SearchTermModifierRulesRequestSortBy $sortBy, SortOrder $sortOrder) : SearchTermModifierRulesRequestSortBySorting
    {
        $result = new SearchTermModifierRulesRequestSortBySorting();
        $result->sortBy = $sortBy;
        $result->sortOrder = $sortOrder;
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchTermModifierRulesRequestSortBySorting
    {
        $result = new SearchTermModifierRulesRequestSortBySorting();
        if (array_key_exists("sortBy", $arr))
        {
            $result->sortBy = SearchTermModifierRulesRequestSortBy::from($arr["sortBy"]);
        }
        if (array_key_exists("sortOrder", $arr))
        {
            $result->sortOrder = SortOrder::from($arr["sortOrder"]);
        }
        return $result;
    }
    
    function setSortBy(SearchTermModifierRulesRequestSortBy $sortBy)
    {
        $this->sortBy = $sortBy;
        return $this;
    }
    
    function setSortOrder(SortOrder $sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }
}
