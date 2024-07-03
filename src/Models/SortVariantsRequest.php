<?php declare(strict_types=1);

namespace Relewise\Models;

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
    function setProductId(string $productId)
    {
        $this->productId = $productId;
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
