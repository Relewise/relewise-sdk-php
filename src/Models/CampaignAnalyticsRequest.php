<?php declare(strict_types=1);

namespace Relewise\Models;

/** Analytics data request for campaign Id during PeriodUtc. */
class CampaignAnalyticsRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.CampaignAnalyticsRequest, Relewise.Client";
    /** The campaign to provide analytics for. */
    public string $id;
    public DateTimeRange $periodUtc;
    public ?FilterCollection $productFilters;
    public ?FilterCollection $displayAdFilters;
    public ?Language $language;
    public ?Currency $currency;
    public ?SelectedProductPropertiesSettings $selectedProductProperties;
    public ?SelectedDisplayAdPropertiesSettings $selectedDisplayAdProperties;
    
    public static function create(string $id, DateTimeRange $periodUtc, ?FilterCollection $productFilters, ?FilterCollection $displayAdFilters) : CampaignAnalyticsRequest
    {
        $result = new CampaignAnalyticsRequest();
        $result->id = $id;
        $result->periodUtc = $periodUtc;
        $result->productFilters = $productFilters;
        $result->displayAdFilters = $displayAdFilters;
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignAnalyticsRequest
    {
        $result = LicensedRequest::hydrateBase(new CampaignAnalyticsRequest(), $arr);
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("periodUtc", $arr))
        {
            $result->periodUtc = DateTimeRange::hydrate($arr["periodUtc"]);
        }
        if (array_key_exists("productFilters", $arr))
        {
            $result->productFilters = FilterCollection::hydrate($arr["productFilters"]);
        }
        if (array_key_exists("displayAdFilters", $arr))
        {
            $result->displayAdFilters = FilterCollection::hydrate($arr["displayAdFilters"]);
        }
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
        }
        if (array_key_exists("selectedProductProperties", $arr))
        {
            $result->selectedProductProperties = SelectedProductPropertiesSettings::hydrate($arr["selectedProductProperties"]);
        }
        if (array_key_exists("selectedDisplayAdProperties", $arr))
        {
            $result->selectedDisplayAdProperties = SelectedDisplayAdPropertiesSettings::hydrate($arr["selectedDisplayAdProperties"]);
        }
        return $result;
    }
    
    /** The campaign to provide analytics for. */
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    
    function setPeriodUtc(DateTimeRange $periodUtc)
    {
        $this->periodUtc = $periodUtc;
        return $this;
    }
    
    function setProductFilters(?FilterCollection $productFilters)
    {
        $this->productFilters = $productFilters;
        return $this;
    }
    
    function setDisplayAdFilters(?FilterCollection $displayAdFilters)
    {
        $this->displayAdFilters = $displayAdFilters;
        return $this;
    }
    
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    
    function setSelectedProductProperties(?SelectedProductPropertiesSettings $selectedProductProperties)
    {
        $this->selectedProductProperties = $selectedProductProperties;
        return $this;
    }
    
    function setSelectedDisplayAdProperties(?SelectedDisplayAdPropertiesSettings $selectedDisplayAdProperties)
    {
        $this->selectedDisplayAdProperties = $selectedDisplayAdProperties;
        return $this;
    }
}
