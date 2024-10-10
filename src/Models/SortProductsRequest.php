<?php declare(strict_types=1);

namespace Relewise\Models;

class SortProductsRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.SortProductsRequest, Relewise.Client";
    
    public array $productIds;
    
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, ... $productIds) : SortProductsRequest
    {
        $result = new SortProductsRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->productIds = $productIds;
        return $result;
    }
    
    public static function hydrate(array $arr) : SortProductsRequest
    {
        $result = ProductRecommendationRequest::hydrateBase(new SortProductsRequest(), $arr);
        if (array_key_exists("productIds", $arr))
        {
            $result->productIds = array();
            foreach($arr["productIds"] as &$value)
            {
                array_push($result->productIds, $value);
            }
        }
        return $result;
    }
    
    function setProductIds(string ... $productIds)
    {
        $this->productIds = $productIds;
        return $this;
    }
    
    /** @param string[] $productIds new value. */
    function setProductIdsFromArray(array $productIds)
    {
        $this->productIds = $productIds;
        return $this;
    }
    
    function addToProductIds(string $productIds)
    {
        if (!isset($this->productIds))
        {
            $this->productIds = array();
        }
        array_push($this->productIds, $productIds);
        return $this;
    }
    
    function setSettings(ProductRecommendationRequestSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    
    function setRelevanceModifiers(RelevanceModifierCollection $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
        return $this;
    }
    
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setDisplayedAtLocationType(string $displayedAtLocationType)
    {
        $this->displayedAtLocationType = $displayedAtLocationType;
        return $this;
    }
    
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
