<?php declare(strict_types=1);

namespace Relewise\Models;

class PredictionRulesRequestSortBySorting
{
    public PredictionRulesRequestSortBy $sortBy;
    
    public SortOrder $sortOrder;
    
    public static function create(PredictionRulesRequestSortBy $sortBy, SortOrder $sortOrder) : PredictionRulesRequestSortBySorting
    {
        $result = new PredictionRulesRequestSortBySorting();
        $result->sortBy = $sortBy;
        $result->sortOrder = $sortOrder;
        return $result;
    }
    
    public static function hydrate(array $arr) : PredictionRulesRequestSortBySorting
    {
        $result = new PredictionRulesRequestSortBySorting();
        if (array_key_exists("sortBy", $arr))
        {
            $result->sortBy = PredictionRulesRequestSortBy::from($arr["sortBy"]);
        }
        if (array_key_exists("sortOrder", $arr))
        {
            $result->sortOrder = SortOrder::from($arr["sortOrder"]);
        }
        return $result;
    }
    
    function setSortBy(PredictionRulesRequestSortBy $sortBy)
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
