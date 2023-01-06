<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class PersonalProductCategoryRecommendationRequest extends ProductCategoryRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PersonalProductCategoryRecommendationRequest, Relewise.Client";
    public int $sinceMinutesAgo;
    public ProductCategoryRecommendationWeights $weights;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, ProductCategoryRecommendationWeights $weights) : PersonalProductCategoryRecommendationRequest
    {
        $result = new PersonalProductCategoryRecommendationRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->weights = $weights;
        return $result;
    }
    public static function hydrate(array $arr) : PersonalProductCategoryRecommendationRequest
    {
        $result = ProductCategoryRecommendationRequest::hydrateBase(new PersonalProductCategoryRecommendationRequest(), $arr);
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
