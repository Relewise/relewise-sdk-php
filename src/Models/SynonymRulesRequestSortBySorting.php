<?php declare(strict_types=1);

namespace Relewise\Models;

class SynonymRulesRequestSortBySorting
{
    public SynonymRulesRequestSortBy $sortBy;
    public SortOrder $sortOrder;
    
    public static function create(SynonymRulesRequestSortBy $sortBy, SortOrder $sortOrder) : SynonymRulesRequestSortBySorting
    {
        $result = new SynonymRulesRequestSortBySorting();
        $result->sortBy = $sortBy;
        $result->sortOrder = $sortOrder;
        return $result;
    }
    
    public static function hydrate(array $arr) : SynonymRulesRequestSortBySorting
    {
        $result = new SynonymRulesRequestSortBySorting();
        if (array_key_exists("sortBy", $arr))
        {
            $result->sortBy = SynonymRulesRequestSortBy::from($arr["sortBy"]);
        }
        if (array_key_exists("sortOrder", $arr))
        {
            $result->sortOrder = SortOrder::from($arr["sortOrder"]);
        }
        return $result;
    }
    
    function setSortBy(SynonymRulesRequestSortBy $sortBy)
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
