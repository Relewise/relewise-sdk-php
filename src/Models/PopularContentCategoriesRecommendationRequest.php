<?php declare(strict_types=1);

namespace Relewise\Models;

class PopularContentCategoriesRecommendationRequest extends ContentCategoryRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PopularContentCategoriesRecommendationRequest, Relewise.Client";
    public int $sinceMinutesAgo;
    public ContentCategoryRecommendationWeights $weights;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, ContentCategoryRecommendationWeights $weights) : PopularContentCategoriesRecommendationRequest
    {
        $result = new PopularContentCategoriesRecommendationRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->weights = $weights;
        return $result;
    }
    public static function hydrate(array $arr) : PopularContentCategoriesRecommendationRequest
    {
        $result = ContentCategoryRecommendationRequest::hydrateBase(new PopularContentCategoriesRecommendationRequest(), $arr);
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        if (array_key_exists("weights", $arr))
        {
            $result->weights = ContentCategoryRecommendationWeights::hydrate($arr["weights"]);
        }
        return $result;
    }
    
    function setSinceMinutesAgo(int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    
    function setWeights(ContentCategoryRecommendationWeights $weights)
    {
        $this->weights = $weights;
        return $this;
    }
    
    function setSettings(ContentCategoryRecommendationRequestSettings $settings)
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
