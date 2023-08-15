<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class PopularProductsRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PopularProductsRequest, Relewise.Client";
    public PopularityTypes $basedOn;
    public int $sinceMinutesAgo;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, PopularityTypes $basedOn) : PopularProductsRequest
    {
        $result = new PopularProductsRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->basedOn = $basedOn;
        return $result;
    }
    public static function hydrate(array $arr) : PopularProductsRequest
    {
        $result = ProductRecommendationRequest::hydrateBase(new PopularProductsRequest(), $arr);
        if (array_key_exists("basedOn", $arr))
        {
            $result->basedOn = PopularityTypes::from($arr["basedOn"]);
        }
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        return $result;
    }
    /**
     * Sets basedOn to a new value.
     * @param PopularityTypes $basedOn new value.
     */
    function setBasedOn(PopularityTypes $basedOn)
    {
        $this->basedOn = $basedOn;
        return $this;
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
     * Sets settings to a new value.
     * @param ProductRecommendationRequestSettings $settings new value.
     */
    function setSettings(ProductRecommendationRequestSettings $settings)
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
