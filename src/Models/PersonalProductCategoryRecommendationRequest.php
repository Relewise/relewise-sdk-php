<?php declare(strict_types=1);

namespace Relewise\Models;

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
    function setSinceMinutesAgo(int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    function setWeights(ProductCategoryRecommendationWeights $weights)
    {
        $this->weights = $weights;
        return $this;
    }
    function setSettings(ProductCategoryRecommendationRequestSettings $settings)
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
