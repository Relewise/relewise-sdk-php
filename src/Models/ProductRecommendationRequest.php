<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class ProductRecommendationRequest extends RecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ProductRecommendationRequest, Relewise.Client";
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
    /**
     * Sets settings to a new value.
     * @param ProductRecommendationRequestSettings $settings new value.
     */
    function setSettings(ProductRecommendationRequestSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    /**
     * Sets language to a new value.
     * @param ?Language $language new value.
     */
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * Sets user to a new value.
     * @param User $user new value.
     */
    function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
    /**
     * Sets relevanceModifiers to a new value.
     * @param RelevanceModifierCollection $relevanceModifiers new value.
     */
    function setRelevanceModifiers(RelevanceModifierCollection $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
        return $this;
    }
    /**
     * Sets filters to a new value.
     * @param FilterCollection $filters new value.
     */
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Sets displayedAtLocationType to a new value.
     * @param string $displayedAtLocationType new value.
     */
    function setDisplayedAtLocationType(string $displayedAtLocationType)
    {
        $this->displayedAtLocationType = $displayedAtLocationType;
        return $this;
    }
    /**
     * Sets currency to a new value.
     * @param ?Currency $currency new value.
     */
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
