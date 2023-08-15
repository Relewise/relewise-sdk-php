<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class RedirectRulesRequestSortBySorting
{
    public string $typeDefinition = "Relewise.Client.Requests.Shared.Sorting`1[[Relewise.Client.Requests.Search.Rules.RedirectRulesRequest+SortBy, Relewise.Client, Version=1.61.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public RedirectRulesRequestSortBy $sortBy;
    public SortOrder $sortOrder;
    public static function create(RedirectRulesRequestSortBy $sortBy, SortOrder $sortOrder) : RedirectRulesRequestSortBySorting
    {
        $result = new RedirectRulesRequestSortBySorting();
        $result->sortBy = $sortBy;
        $result->sortOrder = $sortOrder;
        return $result;
    }
    public static function hydrate(array $arr) : RedirectRulesRequestSortBySorting
    {
        $result = new RedirectRulesRequestSortBySorting();
        if (array_key_exists("sortBy", $arr))
        {
            $result->sortBy = RedirectRulesRequestSortBy::from($arr["sortBy"]);
        }
        if (array_key_exists("sortOrder", $arr))
        {
            $result->sortOrder = SortOrder::from($arr["sortOrder"]);
        }
        return $result;
    }
    /**
     * Sets sortBy to a new value.
     * @param RedirectRulesRequestSortBy $sortBy new value.
     */
    function setSortBy(RedirectRulesRequestSortBy $sortBy)
    {
        $this->sortBy = $sortBy;
        return $this;
    }
    /**
     * Sets sortOrder to a new value.
     * @param SortOrder $sortOrder new value.
     */
    function setSortOrder(SortOrder $sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }
}
