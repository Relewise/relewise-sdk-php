<?php declare(strict_types=1);

namespace Relewise\Models;

class LocationsRequestSortBySorting
{
    public LocationsRequestSortBy $sortBy;
    public SortOrder $sortOrder;
    public static function create(LocationsRequestSortBy $sortBy, SortOrder $sortOrder) : LocationsRequestSortBySorting
    {
        $result = new LocationsRequestSortBySorting();
        $result->sortBy = $sortBy;
        $result->sortOrder = $sortOrder;
        return $result;
    }
    public static function hydrate(array $arr) : LocationsRequestSortBySorting
    {
        $result = new LocationsRequestSortBySorting();
        if (array_key_exists("sortBy", $arr))
        {
            $result->sortBy = LocationsRequestSortBy::from($arr["sortBy"]);
        }
        if (array_key_exists("sortOrder", $arr))
        {
            $result->sortOrder = SortOrder::from($arr["sortOrder"]);
        }
        return $result;
    }
    
    function setSortBy(LocationsRequestSortBy $sortBy)
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
