<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchResultModifierRulesRequestSortBySorting
{
    public string $typeDefinition = "Relewise.Client.Requests.Shared.Sorting`1[[Relewise.Client.Requests.Search.Rules.SearchResultModifierRulesRequest+SortBy, Relewise.Client, Version=1.156.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public SearchResultModifierRulesRequestSortBy $sortBy;
    public SortOrder $sortOrder;
    public static function create(SearchResultModifierRulesRequestSortBy $sortBy, SortOrder $sortOrder) : SearchResultModifierRulesRequestSortBySorting
    {
        $result = new SearchResultModifierRulesRequestSortBySorting();
        $result->sortBy = $sortBy;
        $result->sortOrder = $sortOrder;
        return $result;
    }
    public static function hydrate(array $arr) : SearchResultModifierRulesRequestSortBySorting
    {
        $result = new SearchResultModifierRulesRequestSortBySorting();
        if (array_key_exists("sortBy", $arr))
        {
            $result->sortBy = SearchResultModifierRulesRequestSortBy::from($arr["sortBy"]);
        }
        if (array_key_exists("sortOrder", $arr))
        {
            $result->sortOrder = SortOrder::from($arr["sortOrder"]);
        }
        return $result;
    }
    function setSortBy(SearchResultModifierRulesRequestSortBy $sortBy)
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
