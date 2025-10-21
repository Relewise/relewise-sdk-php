<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdsRequestSortBySorting
{
    public DisplayAdsRequestSortBy $sortBy;
    public SortOrder $sortOrder;
    
    public static function create(DisplayAdsRequestSortBy $sortBy, SortOrder $sortOrder) : DisplayAdsRequestSortBySorting
    {
        $result = new DisplayAdsRequestSortBySorting();
        $result->sortBy = $sortBy;
        $result->sortOrder = $sortOrder;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdsRequestSortBySorting
    {
        $result = new DisplayAdsRequestSortBySorting();
        if (array_key_exists("sortBy", $arr))
        {
            $result->sortBy = DisplayAdsRequestSortBy::from($arr["sortBy"]);
        }
        if (array_key_exists("sortOrder", $arr))
        {
            $result->sortOrder = SortOrder::from($arr["sortOrder"]);
        }
        return $result;
    }
    
    function setSortBy(DisplayAdsRequestSortBy $sortBy)
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
