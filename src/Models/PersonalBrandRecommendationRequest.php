<?php declare(strict_types=1);

namespace Relewise\Models;

class PersonalBrandRecommendationRequest extends BrandRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PersonalBrandRecommendationRequest, Relewise.Client";
    public int $sinceMinutesAgo;
    public BrandRecommendationWeights $weights;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, BrandRecommendationWeights $weights) : PersonalBrandRecommendationRequest
    {
        $result = new PersonalBrandRecommendationRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->weights = $weights;
        return $result;
    }
    public static function hydrate(array $arr) : PersonalBrandRecommendationRequest
    {
        $result = BrandRecommendationRequest::hydrateBase(new PersonalBrandRecommendationRequest(), $arr);
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        if (array_key_exists("weights", $arr))
        {
            $result->weights = BrandRecommendationWeights::hydrate($arr["weights"]);
        }
        return $result;
    }
    
    function setSinceMinutesAgo(int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    
    function setWeights(BrandRecommendationWeights $weights)
    {
        $this->weights = $weights;
        return $this;
    }
    
    function setSettings(BrandRecommendationRequestSettings $settings)
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
