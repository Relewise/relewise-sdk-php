<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdTemplatesRequestSortBySorting
{
    public DisplayAdTemplatesRequestSortBy $sortBy;
    public SortOrder $sortOrder;
    
    public static function create(DisplayAdTemplatesRequestSortBy $sortBy, SortOrder $sortOrder) : DisplayAdTemplatesRequestSortBySorting
    {
        $result = new DisplayAdTemplatesRequestSortBySorting();
        $result->sortBy = $sortBy;
        $result->sortOrder = $sortOrder;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdTemplatesRequestSortBySorting
    {
        $result = new DisplayAdTemplatesRequestSortBySorting();
        if (array_key_exists("sortBy", $arr))
        {
            $result->sortBy = DisplayAdTemplatesRequestSortBy::from($arr["sortBy"]);
        }
        if (array_key_exists("sortOrder", $arr))
        {
            $result->sortOrder = SortOrder::from($arr["sortOrder"]);
        }
        return $result;
    }
    
    function setSortBy(DisplayAdTemplatesRequestSortBy $sortBy)
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
