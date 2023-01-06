<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class PurchasedWithCurrentCartRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PurchasedWithCurrentCartRequest, Relewise.Client";
    public static function create() : PurchasedWithCurrentCartRequest
    {
        $result = new PurchasedWithCurrentCartRequest();
        return $result;
    }
    public static function hydrate(array $arr) : PurchasedWithCurrentCartRequest
    {
        $result = ProductRecommendationRequest::hydrateBase(new PurchasedWithCurrentCartRequest(), $arr);
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
}
