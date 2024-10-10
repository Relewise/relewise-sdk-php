<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class ProductRecommendationRequest extends RecommendationRequest
{
    public string $typeDefinition = "";
    public ProductRecommendationRequestSettings $settings;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Recommendations.CustomProductRecommendationRequest, Relewise.Client")
        {
            return CustomProductRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PersonalProductRecommendationRequest, Relewise.Client")
        {
            return PersonalProductRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PopularProductsRequest, Relewise.Client")
        {
            return PopularProductsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.ProductsViewedAfterViewingContentRequest, Relewise.Client")
        {
            return ProductsViewedAfterViewingContentRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.ProductsViewedAfterViewingProductRequest, Relewise.Client")
        {
            return ProductsViewedAfterViewingProductRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PurchasedWithCurrentCartRequest, Relewise.Client")
        {
            return PurchasedWithCurrentCartRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PurchasedWithMultipleProductsRequest, Relewise.Client")
        {
            return PurchasedWithMultipleProductsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PurchasedWithProductRequest, Relewise.Client")
        {
            return PurchasedWithProductRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.RecentlyViewedProductsRequest, Relewise.Client")
        {
            return RecentlyViewedProductsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.SearchTermBasedProductRecommendationRequest, Relewise.Client")
        {
            return SearchTermBasedProductRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.SimilarProductsRequest, Relewise.Client")
        {
            return SimilarProductsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.SortProductsRequest, Relewise.Client")
        {
            return SortProductsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.SortVariantsRequest, Relewise.Client")
        {
            return SortVariantsRequest::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = RecommendationRequest::hydrateBase($result, $arr);
        if (array_key_exists("settings", $arr))
        {
            $result->settings = ProductRecommendationRequestSettings::hydrate($arr["settings"]);
        }
        return $result;
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
