<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class ProductCategoryRecommendationRequest extends RecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ProductCategoryRecommendationRequest, Relewise.Client";
    public ProductCategoryRecommendationRequestSettings $settings;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Recommendations.PersonalProductCategoryRecommendationRequest, Relewise.Client")
        {
            return PersonalProductCategoryRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PopularProductCategoriesRecommendationRequest, Relewise.Client")
        {
            return PopularProductCategoriesRecommendationRequest::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = RecommendationRequest::hydrateBase($result, $arr);
        if (array_key_exists("settings", $arr))
        {
            $result->settings = ProductCategoryRecommendationRequestSettings::hydrate($arr["settings"]);
        }
        return $result;
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
