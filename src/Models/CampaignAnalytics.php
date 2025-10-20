<?php declare(strict_types=1);

namespace Relewise\Models;

class CampaignAnalytics
{
    public CampaignAnalyticsProductAnalytics $products;
    public CampaignAnalyticsDisplayAdAnalytics $displayAds;
    
    public static function create(CampaignAnalyticsProductAnalytics $products, CampaignAnalyticsDisplayAdAnalytics $displayAds) : CampaignAnalytics
    {
        $result = new CampaignAnalytics();
        $result->products = $products;
        $result->displayAds = $displayAds;
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignAnalytics
    {
        $result = new CampaignAnalytics();
        if (array_key_exists("products", $arr))
        {
            $result->products = CampaignAnalyticsProductAnalytics::hydrate($arr["products"]);
        }
        if (array_key_exists("displayAds", $arr))
        {
            $result->displayAds = CampaignAnalyticsDisplayAdAnalytics::hydrate($arr["displayAds"]);
        }
        return $result;
    }
    
    function setProducts(CampaignAnalyticsProductAnalytics $products)
    {
        $this->products = $products;
        return $this;
    }
    
    function setDisplayAds(CampaignAnalyticsDisplayAdAnalytics $displayAds)
    {
        $this->displayAds = $displayAds;
        return $this;
    }
}
