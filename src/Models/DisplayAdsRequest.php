<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdsRequest extends DisplayAdEntityStatestringDisplayAdMetadataValuesDisplayAdsRequestSortByDisplayAdsRequestEntityFiltersEntitiesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.DisplayAdsRequest, Relewise.Client";
    public static function create(?DisplayAdsRequestEntityFilters $filters, ?DisplayAdsRequestSortBySorting $sorting, int $skip, int $take) : DisplayAdsRequest
    {
        $result = new DisplayAdsRequest();
        $result->filters = $filters;
        $result->sorting = $sorting;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdsRequest
    {
        $result = DisplayAdEntityStatestringDisplayAdMetadataValuesDisplayAdsRequestSortByDisplayAdsRequestEntityFiltersEntitiesRequest::hydrateBase(new DisplayAdsRequest(), $arr);
        return $result;
    }
    
    function setFilters(?DisplayAdsRequestEntityFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setSorting(?DisplayAdsRequestSortBySorting $sorting)
    {
        $this->sorting = $sorting;
        return $this;
    }
    
    function setSkip(int $skip)
    {
        $this->skip = $skip;
        return $this;
    }
    
    function setTake(int $take)
    {
        $this->take = $take;
        return $this;
    }
}
