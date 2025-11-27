<?php declare(strict_types=1);

namespace Relewise\Models;

class CampaignAnalyticsDisplayAdAnalyticsPromotedDisplayAdMetrics
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.CampaignAnalytics+DisplayAdAnalytics+PromotedDisplayAdMetrics, Relewise.Client";
    public string $displayAdId;
    public int $promotions;
    public int $lastClickedUnixMinutes;
    public int $numberOfTimesClicked;
    public DisplayAdResult $displayAd;
    
    public static function create(string $displayAdId, int $promotions, int $lastClickedUnixMinutes, int $numberOfTimesClicked) : CampaignAnalyticsDisplayAdAnalyticsPromotedDisplayAdMetrics
    {
        $result = new CampaignAnalyticsDisplayAdAnalyticsPromotedDisplayAdMetrics();
        $result->displayAdId = $displayAdId;
        $result->promotions = $promotions;
        $result->lastClickedUnixMinutes = $lastClickedUnixMinutes;
        $result->numberOfTimesClicked = $numberOfTimesClicked;
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignAnalyticsDisplayAdAnalyticsPromotedDisplayAdMetrics
    {
        $result = new CampaignAnalyticsDisplayAdAnalyticsPromotedDisplayAdMetrics();
        if (array_key_exists("displayAdId", $arr))
        {
            $result->displayAdId = $arr["displayAdId"];
        }
        if (array_key_exists("promotions", $arr))
        {
            $result->promotions = $arr["promotions"];
        }
        if (array_key_exists("lastClickedUnixMinutes", $arr))
        {
            $result->lastClickedUnixMinutes = $arr["lastClickedUnixMinutes"];
        }
        if (array_key_exists("numberOfTimesClicked", $arr))
        {
            $result->numberOfTimesClicked = $arr["numberOfTimesClicked"];
        }
        if (array_key_exists("displayAd", $arr))
        {
            $result->displayAd = DisplayAdResult::hydrate($arr["displayAd"]);
        }
        return $result;
    }
    
    function setDisplayAdId(string $displayAdId)
    {
        $this->displayAdId = $displayAdId;
        return $this;
    }
    
    function setPromotions(int $promotions)
    {
        $this->promotions = $promotions;
        return $this;
    }
    
    function setLastClickedUnixMinutes(int $lastClickedUnixMinutes)
    {
        $this->lastClickedUnixMinutes = $lastClickedUnixMinutes;
        return $this;
    }
    
    function setNumberOfTimesClicked(int $numberOfTimesClicked)
    {
        $this->numberOfTimesClicked = $numberOfTimesClicked;
        return $this;
    }
    
    function setDisplayAd(DisplayAdResult $displayAd)
    {
        $this->displayAd = $displayAd;
        return $this;
    }
}
