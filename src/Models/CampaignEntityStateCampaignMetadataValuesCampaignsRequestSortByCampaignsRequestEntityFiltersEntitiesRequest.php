<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class CampaignEntityStateCampaignMetadataValuesCampaignsRequestSortByCampaignsRequestEntityFiltersEntitiesRequest extends LicensedRequest
{
    public string $typeDefinition = "";
    
    public ?CampaignsRequestEntityFilters $filters;
    public ?CampaignsRequestSortBySorting $sorting;
    public int $skip;
    public int $take;
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.RetailMedia.CampaignsRequest, Relewise.Client")
        {
            return CampaignsRequest::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = LicensedRequest::hydrateBase($result, $arr);
        if (array_key_exists("filters", $arr))
        {
            $result->filters = CampaignsRequestEntityFilters::hydrate($arr["filters"]);
        }
        if (array_key_exists("sorting", $arr))
        {
            $result->sorting = CampaignsRequestSortBySorting::hydrate($arr["sorting"]);
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
    
    function setFilters(?CampaignsRequestEntityFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setSorting(?CampaignsRequestSortBySorting $sorting)
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
