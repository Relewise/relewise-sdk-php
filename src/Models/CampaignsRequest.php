<?php declare(strict_types=1);

namespace Relewise\Models;

class CampaignsRequest extends CampaignEntityStateCampaignMetadataValuesCampaignsRequestSortByCampaignsRequestEntityFiltersEntitiesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.CampaignsRequest, Relewise.Client";
    public static function create(?CampaignsRequestEntityFilters $filters, ?CampaignsRequestSortBySorting $sorting, int $skip, int $take) : CampaignsRequest
    {
        $result = new CampaignsRequest();
        $result->filters = $filters;
        $result->sorting = $sorting;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    public static function hydrate(array $arr) : CampaignsRequest
    {
        $result = CampaignEntityStateCampaignMetadataValuesCampaignsRequestSortByCampaignsRequestEntityFiltersEntitiesRequest::hydrateBase(new CampaignsRequest(), $arr);
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
