<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SortProductsRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.SortProductsRequest, Relewise.Client";
    public array $productIds;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user) : SortProductsRequest
    {
        $result = new SortProductsRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        return $result;
    }
    public static function hydrate(array $arr) : SortProductsRequest
    {
        $result = ProductRecommendationRequest::hydrateBase(new SortProductsRequest(), $arr);
        if (array_key_exists("productIds", $arr))
        {
            $result->productIds = array();
            foreach($arr["productIds"] as &$value)
            {
                array_push($result->productIds, $value);
            }
        }
        return $result;
    }
    function withProductIds(string ... $productIds)
    {
        $this->productIds = $productIds;
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
