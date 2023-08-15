<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class PopularContentCategoriesRecommendationRequest extends ContentCategoryRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PopularContentCategoriesRecommendationRequest, Relewise.Client";
    public int $sinceMinutesAgo;
    public ContentCategoryRecommendationWeights $weights;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, ContentCategoryRecommendationWeights $weights) : PopularContentCategoriesRecommendationRequest
    {
        $result = new PopularContentCategoriesRecommendationRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->weights = $weights;
        return $result;
    }
    public static function hydrate(array $arr) : PopularContentCategoriesRecommendationRequest
    {
        $result = ContentCategoryRecommendationRequest::hydrateBase(new PopularContentCategoriesRecommendationRequest(), $arr);
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        if (array_key_exists("weights", $arr))
        {
            $result->weights = ContentCategoryRecommendationWeights::hydrate($arr["weights"]);
        }
        return $result;
    }
    /**
     * Sets sinceMinutesAgo to a new value.
     * @param int $sinceMinutesAgo new value.
     */
    function setSinceMinutesAgo(int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    /**
     * Sets weights to a new value.
     * @param ContentCategoryRecommendationWeights $weights new value.
     */
    function setWeights(ContentCategoryRecommendationWeights $weights)
    {
        $this->weights = $weights;
        return $this;
    }
    /**
     * Sets settings to a new value.
     * @param ContentCategoryRecommendationRequestSettings $settings new value.
     */
    function setSettings(ContentCategoryRecommendationRequestSettings $settings)
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
