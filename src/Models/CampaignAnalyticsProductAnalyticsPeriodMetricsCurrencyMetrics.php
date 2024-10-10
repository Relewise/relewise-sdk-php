<?php declare(strict_types=1);

namespace Relewise\Models;

class CampaignAnalyticsProductAnalyticsPeriodMetricsCurrencyMetrics
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.CampaignAnalytics+ProductAnalytics+PeriodMetrics+CurrencyMetrics, Relewise.Client";
    
    public string $currency;
    public float $revenue;
    
    public static function create(string $currency, float $revenue) : CampaignAnalyticsProductAnalyticsPeriodMetricsCurrencyMetrics
    {
        $result = new CampaignAnalyticsProductAnalyticsPeriodMetricsCurrencyMetrics();
        $result->currency = $currency;
        $result->revenue = $revenue;
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignAnalyticsProductAnalyticsPeriodMetricsCurrencyMetrics
    {
        $result = new CampaignAnalyticsProductAnalyticsPeriodMetricsCurrencyMetrics();
        if (array_key_exists("currency", $arr))
        {
            $result->currency = $arr["currency"];
        }
        if (array_key_exists("revenue", $arr))
        {
            $result->revenue = $arr["revenue"];
        }
        return $result;
    }
    
    function setCurrency(string $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    
    function setRevenue(float $revenue)
    {
        $this->revenue = $revenue;
        return $this;
    }
}
