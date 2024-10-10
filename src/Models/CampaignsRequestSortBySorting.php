<?php declare(strict_types=1);

namespace Relewise\Models;

class CampaignsRequestSortBySorting
{
    public CampaignsRequestSortBy $sortBy;
    public SortOrder $sortOrder;
    
    public static function create(CampaignsRequestSortBy $sortBy, SortOrder $sortOrder) : CampaignsRequestSortBySorting
    {
        $result = new CampaignsRequestSortBySorting();
        $result->sortBy = $sortBy;
        $result->sortOrder = $sortOrder;
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignsRequestSortBySorting
    {
        $result = new CampaignsRequestSortBySorting();
        if (array_key_exists("sortBy", $arr))
        {
            $result->sortBy = CampaignsRequestSortBy::from($arr["sortBy"]);
        }
        if (array_key_exists("sortOrder", $arr))
        {
            $result->sortOrder = SortOrder::from($arr["sortOrder"]);
        }
        return $result;
    }
    
    function setSortBy(CampaignsRequestSortBy $sortBy)
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
