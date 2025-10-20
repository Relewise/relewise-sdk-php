<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class DisplayAdEntityStatestringDisplayAdMetadataValuesDisplayAdsRequestSortByDisplayAdsRequestEntityFiltersEntitiesRequest extends LicensedRequest
{
    public string $typeDefinition = "";
    public ?DisplayAdsRequestEntityFilters $filters;
    public ?DisplayAdsRequestSortBySorting $sorting;
    public int $skip;
    public int $take;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.RetailMedia.DisplayAdsRequest, Relewise.Client")
        {
            return DisplayAdsRequest::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = LicensedRequest::hydrateBase($result, $arr);
        if (array_key_exists("filters", $arr))
        {
            $result->filters = DisplayAdsRequestEntityFilters::hydrate($arr["filters"]);
        }
        if (array_key_exists("sorting", $arr))
        {
            $result->sorting = DisplayAdsRequestSortBySorting::hydrate($arr["sorting"]);
        }
        if (array_key_exists("skip", $arr))
        {
            $result->skip = $arr["skip"];
        }
        if (array_key_exists("take", $arr))
        {
            $result->take = $arr["take"];
        }
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
