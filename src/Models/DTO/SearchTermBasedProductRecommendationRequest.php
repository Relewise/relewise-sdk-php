<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withTerm(string $term)
    {
        $this->term = $term;
        return $this;
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
