<?php declare(strict_types=1);

namespace Relewise\Models;

class CampaignAnalyticsProductAnalyticsPromotedProductMetrics
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.CampaignAnalytics+ProductAnalytics+PromotedProductMetrics, Relewise.Client";
    
    public string $productId;
    public int $promotions;
    
    public static function create(string $productId, int $promotions) : CampaignAnalyticsProductAnalyticsPromotedProductMetrics
    {
        $result = new CampaignAnalyticsProductAnalyticsPromotedProductMetrics();
        $result->productId = $productId;
        $result->promotions = $promotions;
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignAnalyticsProductAnalyticsPromotedProductMetrics
    {
        $result = new CampaignAnalyticsProductAnalyticsPromotedProductMetrics();
        if (array_key_exists("productId", $arr))
        {
            $result->productId = $arr["productId"];
        }
        if (array_key_exists("promotions", $arr))
        {
            $result->promotions = $arr["promotions"];
        }
        return $result;
    }
    
    function setProductId(string $productId)
    {
        $this->productId = $productId;
        return $this;
    }
    
    function setPromotions(int $promotions)
    {
        $this->promotions = $promotions;
        return $this;
    }
}
