<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SearchTermBasedProductRecommendationRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.SearchTermBasedProductRecommendationRequest, Relewise.Client";
    public string $term;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, string $term) : SearchTermBasedProductRecommendationRequest
    {
        $result = new SearchTermBasedProductRecommendationRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->term = $term;
        return $result;
    }
    public static function hydrate(array $arr) : SearchTermBasedProductRecommendationRequest
    {
        $result = ProductRecommendationRequest::hydrateBase(new SearchTermBasedProductRecommendationRequest(), $arr);
        if (array_key_exists("term", $arr))
        {
            $result->term = $arr["term"];
        }
        return $result;
    }
    function setTerm(string $term)
    {
        $this->term = $term;
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
