<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withProductId(string $productId)
    {
        $this->productId = $productId;
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
}
