<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SearchTermModifierRulesRequestSortBySorting
{
    public string $typeDefinition = "Relewise.Client.Requests.Shared.Sorting`1[[Relewise.Client.Requests.Search.Rules.SearchTermModifierRulesRequest+SortBy, Relewise.Client, Version=1.156.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
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
