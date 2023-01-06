<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class RecentlyViewedProductsRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.RecentlyViewedProductsRequest, Relewise.Client";
    public static function create() : RecentlyViewedProductsRequest
    {
        $result = new RecentlyViewedProductsRequest();
        return $result;
    }
    public static function hydrate(array $arr) : RecentlyViewedProductsRequest
    {
        $result = ProductRecommendationRequest::hydrateBase(new RecentlyViewedProductsRequest(), $arr);
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
    function setUser(User $user)
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
