<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class StemmingRulesRequestSortBySorting
{
    public string $typeDefinition = "Relewise.Client.Requests.Shared.Sorting`1[[Relewise.Client.Requests.Search.Rules.StemmingRulesRequest+SortBy, Relewise.Client, Version=1.156.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public StemmingRulesRequestSortBy $sortBy;
    public SortOrder $sortOrder;
    public static function create(StemmingRulesRequestSortBy $sortBy, SortOrder $sortOrder) : StemmingRulesRequestSortBySorting
    {
        $result = new StemmingRulesRequestSortBySorting();
        $result->sortBy = $sortBy;
        $result->sortOrder = $sortOrder;
        return $result;
    }
    public static function hydrate(array $arr) : StemmingRulesRequestSortBySorting
    {
        $result = new StemmingRulesRequestSortBySorting();
        if (array_key_exists("sortBy", $arr))
        {
            $result->sortBy = StemmingRulesRequestSortBy::from($arr["sortBy"]);
        }
        if (array_key_exists("sortOrder", $arr))
        {
            $result->sortOrder = SortOrder::from($arr["sortOrder"]);
        }
        return $result;
    }
    function setSortBy(StemmingRulesRequestSortBy $sortBy)
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
