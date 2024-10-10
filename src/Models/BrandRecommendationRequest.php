<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class BrandRecommendationRequest extends RecommendationRequest
{
    public string $typeDefinition = "";
    
    public BrandRecommendationRequestSettings $settings;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Recommendations.PersonalBrandRecommendationRequest, Relewise.Client")
        {
            return PersonalBrandRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PopularBrandsRecommendationRequest, Relewise.Client")
        {
            return PopularBrandsRecommendationRequest::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = RecommendationRequest::hydrateBase($result, $arr);
        if (array_key_exists("settings", $arr))
        {
            $result->settings = BrandRecommendationRequestSettings::hydrate($arr["settings"]);
        }
        return $result;
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
