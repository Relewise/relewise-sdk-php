<?php declare(strict_types=1);

namespace Relewise\Models;

class CampaignAnalytics
{
    public CampaignAnalyticsProductAnalytics $products;
    public static function create(CampaignAnalyticsProductAnalytics $products) : CampaignAnalytics
    {
        $result = new CampaignAnalytics();
        $result->products = $products;
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignAnalytics
    {
        $result = new CampaignAnalytics();
        if (array_key_exists("products", $arr))
        {
            $result->products = CampaignAnalyticsProductAnalytics::hydrate($arr["products"]);
        }
        return $result;
    }
    
    function setProducts(CampaignAnalyticsProductAnalytics $products)
    {
        $this->products = $products;
        return $this;
    }
}
