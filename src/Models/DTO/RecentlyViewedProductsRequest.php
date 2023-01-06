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
    function withSettings(ProductRecommendationRequestSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    function withLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function withUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
    function withRelevanceModifiers(RelevanceModifierCollection $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
        return $this;
    }
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function withDisplayedAtLocationType(string $displayedAtLocationType)
    {
        $this->displayedAtLocationType = $displayedAtLocationType;
        return $this;
    }
    function withCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
