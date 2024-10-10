<?php declare(strict_types=1);

namespace Relewise\Models;

/** Defines how campaign performs. */
class CampaignAnalyticsProductAnalytics
{
    public array $timeSeries;
    /** Number of times products are being promoted by the Campaign. */
    public int $promotions;
    /** How many times each individual product was promoted. */
    public array $promotedProducts;
    
    public static function create(array $timeSeries, int $promotions, CampaignAnalyticsProductAnalyticsPromotedProductMetrics ... $promotedProducts) : CampaignAnalyticsProductAnalytics
    {
        $result = new CampaignAnalyticsProductAnalytics();
        $result->timeSeries = $timeSeries;
        $result->promotions = $promotions;
        $result->promotedProducts = $promotedProducts;
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignAnalyticsProductAnalytics
    {
        $result = new CampaignAnalyticsProductAnalytics();
        if (array_key_exists("timeSeries", $arr))
        {
            $result->timeSeries = array();
            foreach($arr["timeSeries"] as &$value)
            {
                array_push($result->timeSeries, $value);
            }
        }
        if (array_key_exists("promotions", $arr))
        {
            $result->promotions = $arr["promotions"];
        }
        if (array_key_exists("promotedProducts", $arr))
        {
            $result->promotedProducts = array();
            foreach($arr["promotedProducts"] as &$value)
            {
                array_push($result->promotedProducts, $value);
            }
        }
        return $result;
    }
    
    function setTimeSeries(CampaignAnalyticsProductAnalyticsPeriodMetrics ... $timeSeries)
    {
        $this->timeSeries = $timeSeries;
        return $this;
    }
    
    /** @param CampaignAnalyticsProductAnalyticsPeriodMetrics[] $timeSeries new value. */
    function setTimeSeriesFromArray(array $timeSeries)
    {
        $this->timeSeries = $timeSeries;
        return $this;
    }
    
    function addToTimeSeries(CampaignAnalyticsProductAnalyticsPeriodMetrics $timeSeries)
    {
        if (!isset($this->timeSeries))
        {
            $this->timeSeries = array();
        }
        array_push($this->timeSeries, $timeSeries);
        return $this;
    }
    
    /** Number of times products are being promoted by the Campaign. */
    function setPromotions(int $promotions)
    {
        $this->promotions = $promotions;
        return $this;
    }
    
    /** How many times each individual product was promoted. */
    function setPromotedProducts(CampaignAnalyticsProductAnalyticsPromotedProductMetrics ... $promotedProducts)
    {
        $this->promotedProducts = $promotedProducts;
        return $this;
    }
    
    /**
     * How many times each individual product was promoted.
     * @param CampaignAnalyticsProductAnalyticsPromotedProductMetrics[] $promotedProducts new value.
     */
    function setPromotedProductsFromArray(array $promotedProducts)
    {
        $this->promotedProducts = $promotedProducts;
        return $this;
    }
    
    /** How many times each individual product was promoted. */
    function addToPromotedProducts(CampaignAnalyticsProductAnalyticsPromotedProductMetrics $promotedProducts)
    {
        if (!isset($this->promotedProducts))
        {
            $this->promotedProducts = array();
        }
        array_push($this->promotedProducts, $promotedProducts);
        return $this;
    }
}
