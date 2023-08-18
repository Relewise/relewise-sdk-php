<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class DecompoundRulesRequestSortBySorting
{
    public string $typeDefinition = "Relewise.Client.Requests.Shared.Sorting`1[[Relewise.Client.Requests.Search.Rules.DecompoundRulesRequest+SortBy, Relewise.Client, Version=1.61.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public DecompoundRulesRequestSortBy $sortBy;
    public SortOrder $sortOrder;
    public static function create(DecompoundRulesRequestSortBy $sortBy, SortOrder $sortOrder) : DecompoundRulesRequestSortBySorting
    {
        $result = new DecompoundRulesRequestSortBySorting();
        $result->sortBy = $sortBy;
        $result->sortOrder = $sortOrder;
        return $result;
    }
    public static function hydrate(array $arr) : DecompoundRulesRequestSortBySorting
    {
        $result = new DecompoundRulesRequestSortBySorting();
        if (array_key_exists("sortBy", $arr))
        {
            $result->sortBy = DecompoundRulesRequestSortBy::from($arr["sortBy"]);
        }
        if (array_key_exists("sortOrder", $arr))
        {
            $result->sortOrder = SortOrder::from($arr["sortOrder"]);
        }
        return $result;
    }
    function setSortBy(DecompoundRulesRequestSortBy $sortBy)
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
