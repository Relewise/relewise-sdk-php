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
    function addToProductAndVariantIds(ProductAndVariantId $productAndVariantIds)
    {
        if (!isset($this->productAndVariantIds))
        {
            $this->productAndVariantIds = array();
        }
        array_push($this->productAndVariantIds, $productAndVariantIds);
        return $this;
    }
    function setSettings(ContentRecommendationRequestSettings $settings)
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
