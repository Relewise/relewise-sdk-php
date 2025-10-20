<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class CampaignAnalyticsDisplayAdAnalyticsPeriodMetrics implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.CampaignAnalytics+DisplayAdAnalytics+PeriodMetrics, Relewise.Client";
    public DateTime $periodFromUtc;
    public int $views;
    public int $clicks;
    
    public static function create(DateTime $periodFromUtc, int $views, int $clicks) : CampaignAnalyticsDisplayAdAnalyticsPeriodMetrics
    {
        $result = new CampaignAnalyticsDisplayAdAnalyticsPeriodMetrics();
        $result->periodFromUtc = $periodFromUtc;
        $result->views = $views;
        $result->clicks = $clicks;
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignAnalyticsDisplayAdAnalyticsPeriodMetrics
    {
        $result = new CampaignAnalyticsDisplayAdAnalyticsPeriodMetrics();
        if (array_key_exists("periodFromUtc", $arr))
        {
            $result->periodFromUtc = new DateTime($arr["periodFromUtc"]);
        }
        if (array_key_exists("views", $arr))
        {
            $result->views = $arr["views"];
        }
        if (array_key_exists("clicks", $arr))
        {
            $result->clicks = $arr["clicks"];
        }
        return $result;
    }
    
    function setPeriodFromUtc(DateTime $periodFromUtc)
    {
        $this->periodFromUtc = $periodFromUtc;
        return $this;
    }
    
    function setViews(int $views)
    {
        $this->views = $views;
        return $this;
    }
    
    function setClicks(int $clicks)
    {
        $this->clicks = $clicks;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        $result["typeDefinition"] = $this->typeDefinition;
        if (isset($this->periodFromUtc))
        {
            $result["periodFromUtc"] = $this->periodFromUtc->format(DATE_ATOM);
        }
        if (isset($this->views))
        {
            $result["views"] = $this->views;
        }
        if (isset($this->clicks))
        {
            $result["clicks"] = $this->clicks;
        }
        return $result;
    }
}
