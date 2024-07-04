<?php declare(strict_types=1);

namespace Relewise\Models;

class CampaignAnalyticsResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.RetailMedia.CampaignAnalyticsResponse, Relewise.Client";
    public CampaignAnalytics $analytics;
    public static function create(CampaignAnalytics $analytics) : CampaignAnalyticsResponse
    {
        $result = new CampaignAnalyticsResponse();
        $result->analytics = $analytics;
        return $result;
    }
    public static function hydrate(array $arr) : CampaignAnalyticsResponse
    {
        $result = TimedResponse::hydrateBase(new CampaignAnalyticsResponse(), $arr);
        if (array_key_exists("analytics", $arr))
        {
            $result->analytics = CampaignAnalytics::hydrate($arr["analytics"]);
        }
        return $result;
    }
    function setAnalytics(CampaignAnalytics $analytics)
    {
        $this->analytics = $analytics;
        return $this;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
