<?php declare(strict_types=1);

namespace Relewise\Models;

class AdvertisersRequestSortBySorting
{
    public AdvertisersRequestSortBy $sortBy;
    public SortOrder $sortOrder;
    public static function create(AdvertisersRequestSortBy $sortBy, SortOrder $sortOrder) : AdvertisersRequestSortBySorting
    {
        $result = new AdvertisersRequestSortBySorting();
        $result->sortBy = $sortBy;
        $result->sortOrder = $sortOrder;
        return $result;
    }
    
    public static function hydrate(array $arr) : AdvertisersRequestSortBySorting
    {
        $result = new AdvertisersRequestSortBySorting();
        if (array_key_exists("sortBy", $arr))
        {
            $result->sortBy = AdvertisersRequestSortBy::from($arr["sortBy"]);
        }
        if (array_key_exists("sortOrder", $arr))
        {
            $result->sortOrder = SortOrder::from($arr["sortOrder"]);
        }
        return $result;
    }
    
    function setSortBy(AdvertisersRequestSortBy $sortBy)
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
