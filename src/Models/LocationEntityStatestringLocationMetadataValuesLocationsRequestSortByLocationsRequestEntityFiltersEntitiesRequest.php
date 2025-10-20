<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class LocationEntityStatestringLocationMetadataValuesLocationsRequestSortByLocationsRequestEntityFiltersEntitiesRequest extends LicensedRequest
{
    public string $typeDefinition = "";
    public ?LocationsRequestEntityFilters $filters;
    public ?LocationsRequestSortBySorting $sorting;
    public int $skip;
    public int $take;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.RetailMedia.LocationsRequest, Relewise.Client")
        {
            return LocationsRequest::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = LicensedRequest::hydrateBase($result, $arr);
        if (array_key_exists("filters", $arr))
        {
            $result->filters = LocationsRequestEntityFilters::hydrate($arr["filters"]);
        }
        if (array_key_exists("sorting", $arr))
        {
            $result->sorting = LocationsRequestSortBySorting::hydrate($arr["sorting"]);
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
    
    function setFilters(?LocationsRequestEntityFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setSorting(?LocationsRequestSortBySorting $sorting)
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
