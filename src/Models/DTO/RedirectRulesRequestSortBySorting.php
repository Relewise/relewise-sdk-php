<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class RedirectRulesRequestSortBySorting
{
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
    function withSortBy(RedirectRulesRequestSortBy $sortBy)
    {
        $this->sortBy = $sortBy;
        return $this;
    }
    function withSortOrder(SortOrder $sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }
}
