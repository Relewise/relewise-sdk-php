<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdTemplatesRequest extends DisplayAdTemplateEntityStatestringDisplayAdTemplateMetadataValuesDisplayAdTemplatesRequestSortByDisplayAdTemplatesRequestEntityFiltersEntitiesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.DisplayAdTemplatesRequest, Relewise.Client";
    public static function create(?DisplayAdTemplatesRequestEntityFilters $filters, ?DisplayAdTemplatesRequestSortBySorting $sorting, int $skip, int $take) : DisplayAdTemplatesRequest
    {
        $result = new DisplayAdTemplatesRequest();
        $result->filters = $filters;
        $result->sorting = $sorting;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdTemplatesRequest
    {
        $result = DisplayAdTemplateEntityStatestringDisplayAdTemplateMetadataValuesDisplayAdTemplatesRequestSortByDisplayAdTemplatesRequestEntityFiltersEntitiesRequest::hydrateBase(new DisplayAdTemplatesRequest(), $arr);
        return $result;
    }
    
    function setFilters(?DisplayAdTemplatesRequestEntityFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setSorting(?DisplayAdTemplatesRequestSortBySorting $sorting)
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
