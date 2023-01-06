<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class PurchasedWithCurrentCartRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PurchasedWithCurrentCartRequest, Relewise.Client";
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user) : PurchasedWithCurrentCartRequest
    {
        $result = new PurchasedWithCurrentCartRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        return $result;
    }
    public static function hydrate(array $arr) : PurchasedWithCurrentCartRequest
    {
        $result = ProductRecommendationRequest::hydrateBase(new PurchasedWithCurrentCartRequest(), $arr);
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
