<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class PopularSearchTermsRecommendationRequest extends RecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PopularSearchTermsRecommendationRequest, Relewise.Client";
    public ?string $term;
    public ?RecommendPopularSearchTermSettings $settings;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user) : PopularSearchTermsRecommendationRequest
    {
        $result = new PopularSearchTermsRecommendationRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        return $result;
    }
    public static function hydrate(array $arr) : PopularSearchTermsRecommendationRequest
    {
        $result = RecommendationRequest::hydrateBase(new PopularSearchTermsRecommendationRequest(), $arr);
        if (array_key_exists("term", $arr))
        {
            $result->term = $arr["term"];
        }
        if (array_key_exists("settings", $arr))
        {
            $result->settings = RecommendPopularSearchTermSettings::hydrate($arr["settings"]);
        }
        return $result;
    }
    /**
     * Sets term to a new value.
     * @param ?string $term new value.
     */
    function setTerm(?string $term)
    {
        $this->term = $term;
        return $this;
    }
    /**
     * Sets settings to a new value.
     * @param ?RecommendPopularSearchTermSettings $settings new value.
     */
    function setSettings(?RecommendPopularSearchTermSettings $settings)
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
