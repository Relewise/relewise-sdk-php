<?php declare(strict_types=1);

namespace Relewise\Models;

/** Analytics data request for campaign Id during PeriodUtc. */
class CampaignAnalyticsRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.CampaignAnalyticsRequest, Relewise.Client";
    
    /** The campaign to provide analytics for. */
    public string $id;
    
    public DateTimeRange $periodUtc;
    
    public ?FilterCollection $filters;
    
    public static function create(string $id, DateTimeRange $periodUtc, ?FilterCollection $filters) : CampaignAnalyticsRequest
    {
        $result = new CampaignAnalyticsRequest();
        $result->id = $id;
        $result->periodUtc = $periodUtc;
        $result->filters = $filters;
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignAnalyticsRequest
    {
        $result = LicensedRequest::hydrateBase(new CampaignAnalyticsRequest(), $arr);
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("periodUtc", $arr))
        {
            $result->periodUtc = DateTimeRange::hydrate($arr["periodUtc"]);
        }
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        return $result;
    }
    
    /** The campaign to provide analytics for. */
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    
    function setPeriodUtc(DateTimeRange $periodUtc)
    {
        $this->periodUtc = $periodUtc;
        return $this;
    }
    
    function setFilters(?FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
