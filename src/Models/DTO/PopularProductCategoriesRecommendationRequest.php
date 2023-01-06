<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withSinceMinutesAgo(int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    function withWeights(ProductCategoryRecommendationWeights $weights)
    {
        $this->weights = $weights;
        return $this;
    }
    function withSettings(ProductCategoryRecommendationRequestSettings $settings)
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
