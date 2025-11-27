<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class CampaignAnalyticsDisplayAdAnalyticsPeriodMetrics implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.CampaignAnalytics+DisplayAdAnalytics+PeriodMetrics, Relewise.Client";
    public DateTime $periodFromUtc;
    public int $promotions;
    public int $clicks;
    
    public static function create(DateTime $periodFromUtc, int $promotions, int $clicks) : CampaignAnalyticsDisplayAdAnalyticsPeriodMetrics
    {
        $result = new CampaignAnalyticsDisplayAdAnalyticsPeriodMetrics();
        $result->periodFromUtc = $periodFromUtc;
        $result->promotions = $promotions;
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
        if (array_key_exists("promotions", $arr))
        {
            $result->promotions = $arr["promotions"];
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
    
    function setPromotions(int $promotions)
    {
        $this->promotions = $promotions;
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
        if (isset($this->promotions))
        {
            $result["promotions"] = $this->promotions;
        }
        if (isset($this->clicks))
        {
            $result["clicks"] = $this->clicks;
        }
        return $result;
    }
}
