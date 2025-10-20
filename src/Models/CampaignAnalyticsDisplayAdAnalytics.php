<?php declare(strict_types=1);

namespace Relewise\Models;

class CampaignAnalyticsDisplayAdAnalytics
{
    public array $timeSeries;
    /** Number of times display ads has been promoted by the Campaign. */
    public int $promotions;
    /** How many times each display ad was promoted. */
    public array $promotedDisplayAds;
    
    public static function create(array $timeSeries, int $promotions, CampaignAnalyticsDisplayAdAnalyticsPromotedDisplayAdMetrics ... $promotedDisplayAds) : CampaignAnalyticsDisplayAdAnalytics
    {
        $result = new CampaignAnalyticsDisplayAdAnalytics();
        $result->timeSeries = $timeSeries;
        $result->promotions = $promotions;
        $result->promotedDisplayAds = $promotedDisplayAds;
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignAnalyticsDisplayAdAnalytics
    {
        $result = new CampaignAnalyticsDisplayAdAnalytics();
        if (array_key_exists("timeSeries", $arr))
        {
            $result->timeSeries = array();
            foreach($arr["timeSeries"] as &$value)
            {
                array_push($result->timeSeries, CampaignAnalyticsDisplayAdAnalyticsPeriodMetrics::hydrate($value));
            }
        }
        if (array_key_exists("promotions", $arr))
        {
            $result->promotions = $arr["promotions"];
        }
        if (array_key_exists("promotedDisplayAds", $arr))
        {
            $result->promotedDisplayAds = array();
            foreach($arr["promotedDisplayAds"] as &$value)
            {
                array_push($result->promotedDisplayAds, CampaignAnalyticsDisplayAdAnalyticsPromotedDisplayAdMetrics::hydrate($value));
            }
        }
        return $result;
    }
    
    function setTimeSeries(CampaignAnalyticsDisplayAdAnalyticsPeriodMetrics ... $timeSeries)
    {
        $this->timeSeries = $timeSeries;
        return $this;
    }
    
    /** @param CampaignAnalyticsDisplayAdAnalyticsPeriodMetrics[] $timeSeries new value. */
    function setTimeSeriesFromArray(array $timeSeries)
    {
        $this->timeSeries = $timeSeries;
        return $this;
    }
    
    function addToTimeSeries(CampaignAnalyticsDisplayAdAnalyticsPeriodMetrics $timeSeries)
    {
        if (!isset($this->timeSeries))
        {
            $this->timeSeries = array();
        }
        array_push($this->timeSeries, $timeSeries);
        return $this;
    }
    
    /** Number of times display ads has been promoted by the Campaign. */
    function setPromotions(int $promotions)
    {
        $this->promotions = $promotions;
        return $this;
    }
    
    /** How many times each display ad was promoted. */
    function setPromotedDisplayAds(CampaignAnalyticsDisplayAdAnalyticsPromotedDisplayAdMetrics ... $promotedDisplayAds)
    {
        $this->promotedDisplayAds = $promotedDisplayAds;
        return $this;
    }
    
    /**
     * How many times each display ad was promoted.
     * @param CampaignAnalyticsDisplayAdAnalyticsPromotedDisplayAdMetrics[] $promotedDisplayAds new value.
     */
    function setPromotedDisplayAdsFromArray(array $promotedDisplayAds)
    {
        $this->promotedDisplayAds = $promotedDisplayAds;
        return $this;
    }
    
    /** How many times each display ad was promoted. */
    function addToPromotedDisplayAds(CampaignAnalyticsDisplayAdAnalyticsPromotedDisplayAdMetrics $promotedDisplayAds)
    {
        if (!isset($this->promotedDisplayAds))
        {
            $this->promotedDisplayAds = array();
        }
        array_push($this->promotedDisplayAds, $promotedDisplayAds);
        return $this;
    }
}
