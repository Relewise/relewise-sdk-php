<?php declare(strict_types=1);

namespace Relewise\Models;

class LocationsRequest extends LocationEntityStateLocationMetadataValuesLocationsRequestSortByLocationsRequestEntityFiltersEntitiesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.LocationsRequest, Relewise.Client";
    public static function create(?LocationsRequestEntityFilters $filters, ?LocationsRequestSortBySorting $sorting, int $skip, int $take) : LocationsRequest
    {
        $result = new LocationsRequest();
        $result->filters = $filters;
        $result->sorting = $sorting;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    
    public static function hydrate(array $arr) : LocationsRequest
    {
        $result = LocationEntityStateLocationMetadataValuesLocationsRequestSortByLocationsRequestEntityFiltersEntitiesRequest::hydrateBase(new LocationsRequest(), $arr);
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
