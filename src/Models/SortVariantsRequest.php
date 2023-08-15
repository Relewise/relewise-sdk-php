<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SortVariantsRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.SortVariantsRequest, Relewise.Client";
    public string $productId;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, string $productId) : SortVariantsRequest
    {
        $result = new SortVariantsRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->productId = $productId;
        return $result;
    }
    public static function hydrate(array $arr) : SortVariantsRequest
    {
        $result = ProductRecommendationRequest::hydrateBase(new SortVariantsRequest(), $arr);
        if (array_key_exists("productId", $arr))
        {
            $result->productId = $arr["productId"];
        }
        return $result;
    }
    /**
     * Sets productId to a new value.
     * @param string $productId new value.
     */
    function setProductId(string $productId)
    {
        $this->productId = $productId;
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
