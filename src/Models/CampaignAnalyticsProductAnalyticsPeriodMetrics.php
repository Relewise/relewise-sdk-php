<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class CampaignAnalyticsProductAnalyticsPeriodMetrics implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.CampaignAnalytics+ProductAnalytics+PeriodMetrics, Relewise.Client";
    
    public DateTime $periodFromUtc;
    public int $views;
    public int $salesQuantity;
    public array $currencies;
    
    public static function create(DateTime $periodFromUtc, int $views, int $salesQuantity, CampaignAnalyticsProductAnalyticsPeriodMetricsCurrencyMetrics ... $currencies) : CampaignAnalyticsProductAnalyticsPeriodMetrics
    {
        $result = new CampaignAnalyticsProductAnalyticsPeriodMetrics();
        $result->periodFromUtc = $periodFromUtc;
        $result->views = $views;
        $result->salesQuantity = $salesQuantity;
        $result->currencies = $currencies;
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignAnalyticsProductAnalyticsPeriodMetrics
    {
        $result = new CampaignAnalyticsProductAnalyticsPeriodMetrics();
        if (array_key_exists("periodFromUtc", $arr))
        {
            $result->periodFromUtc = new DateTime($arr["periodFromUtc"]);
        }
        if (array_key_exists("views", $arr))
        {
            $result->views = $arr["views"];
        }
        if (array_key_exists("salesQuantity", $arr))
        {
            $result->salesQuantity = $arr["salesQuantity"];
        }
        if (array_key_exists("currencies", $arr))
        {
            $result->currencies = array();
            foreach($arr["currencies"] as &$value)
            {
                array_push($result->currencies, $value);
            }
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
    
    function setSalesQuantity(int $salesQuantity)
    {
        $this->salesQuantity = $salesQuantity;
        return $this;
    }
    
    function setCurrencies(CampaignAnalyticsProductAnalyticsPeriodMetricsCurrencyMetrics ... $currencies)
    {
        $this->currencies = $currencies;
        return $this;
    }
    
    /** @param CampaignAnalyticsProductAnalyticsPeriodMetricsCurrencyMetrics[] $currencies new value. */
    function setCurrenciesFromArray(array $currencies)
    {
        $this->currencies = $currencies;
        return $this;
    }
    
    function addToCurrencies(CampaignAnalyticsProductAnalyticsPeriodMetricsCurrencyMetrics $currencies)
    {
        if (!isset($this->currencies))
        {
            $this->currencies = array();
        }
        array_push($this->currencies, $currencies);
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
        if (isset($this->salesQuantity))
        {
            $result["salesQuantity"] = $this->salesQuantity;
        }
        if (isset($this->currencies))
        {
            $result["currencies"] = $this->currencies;
        }
        return $result;
    }
}
