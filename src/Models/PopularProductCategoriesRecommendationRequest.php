<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class PopularProductCategoriesRecommendationRequest extends ProductCategoryRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PopularProductCategoriesRecommendationRequest, Relewise.Client";
    public int $sinceMinutesAgo;
    public ProductCategoryRecommendationWeights $weights;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, ProductCategoryRecommendationWeights $weights) : PopularProductCategoriesRecommendationRequest
    {
        $result = new PopularProductCategoriesRecommendationRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->weights = $weights;
        return $result;
    }
    public static function hydrate(array $arr) : PopularProductCategoriesRecommendationRequest
    {
        $result = ProductCategoryRecommendationRequest::hydrateBase(new PopularProductCategoriesRecommendationRequest(), $arr);
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        if (array_key_exists("weights", $arr))
        {
            $result->weights = ProductCategoryRecommendationWeights::hydrate($arr["weights"]);
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
     * @param ProductCategoryRecommendationWeights $weights new value.
     */
    function setWeights(ProductCategoryRecommendationWeights $weights)
    {
        $this->weights = $weights;
        return $this;
    }
    /**
     * Sets settings to a new value.
     * @param ProductCategoryRecommendationRequestSettings $settings new value.
     */
    function setSettings(ProductCategoryRecommendationRequestSettings $settings)
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
