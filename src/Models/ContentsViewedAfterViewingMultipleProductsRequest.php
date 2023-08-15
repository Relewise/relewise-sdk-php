<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentsViewedAfterViewingMultipleProductsRequest extends ContentRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ContentsViewedAfterViewingMultipleProductsRequest, Relewise.Client";
    public array $productAndVariantIds;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, ProductAndVariantId ... $productAndVariantIds) : ContentsViewedAfterViewingMultipleProductsRequest
    {
        $result = new ContentsViewedAfterViewingMultipleProductsRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->productAndVariantIds = $productAndVariantIds;
        return $result;
    }
    public static function hydrate(array $arr) : ContentsViewedAfterViewingMultipleProductsRequest
    {
        $result = ContentRecommendationRequest::hydrateBase(new ContentsViewedAfterViewingMultipleProductsRequest(), $arr);
        if (array_key_exists("productAndVariantIds", $arr))
        {
            $result->productAndVariantIds = array();
            foreach($arr["productAndVariantIds"] as &$value)
            {
                array_push($result->productAndVariantIds, ProductAndVariantId::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets productAndVariantIds to a new value.
     * @param ProductAndVariantId[] $productAndVariantIds new value.
     */
    function setProductAndVariantIds(ProductAndVariantId ... $productAndVariantIds)
    {
        $this->productAndVariantIds = $productAndVariantIds;
        return $this;
    }
    /**
     * Sets productAndVariantIds to a new value from an array.
     * @param ProductAndVariantId[] $productAndVariantIds new value.
     */
    function setProductAndVariantIdsFromArray(array $productAndVariantIds)
    {
        $this->productAndVariantIds = $productAndVariantIds;
        return $this;
    }
    /**
     * Adds a new element to productAndVariantIds.
     * @param ProductAndVariantId $productAndVariantIds new element.
     */
    function addToProductAndVariantIds(ProductAndVariantId $productAndVariantIds)
    {
        if (!isset($this->productAndVariantIds))
        {
            $this->productAndVariantIds = array();
        }
        array_push($this->productAndVariantIds, $productAndVariantIds);
        return $this;
    }
    /**
     * Sets settings to a new value.
     * @param ContentRecommendationRequestSettings $settings new value.
     */
    function setSettings(ContentRecommendationRequestSettings $settings)
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
