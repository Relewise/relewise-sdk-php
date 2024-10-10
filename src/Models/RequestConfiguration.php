<?php declare(strict_types=1);

namespace Relewise\Models;

class RequestConfiguration
{
    public RequestConfigurationPrioritization $filters;
    public RequestConfigurationPrioritization $relevanceModifiers;
    public OverriddenProductRecommendationRequestSettings $overriddenProductRecommendationRequestSettings;
    public OverriddenContentRecommendationRequestSettings $overriddenContentRecommendationRequestSettings;
    
    public static function create() : RequestConfiguration
    {
        $result = new RequestConfiguration();
        return $result;
    }
    
    public static function hydrate(array $arr) : RequestConfiguration
    {
        $result = new RequestConfiguration();
        if (array_key_exists("filters", $arr))
        {
            $result->filters = RequestConfigurationPrioritization::from($arr["filters"]);
        }
        if (array_key_exists("relevanceModifiers", $arr))
        {
            $result->relevanceModifiers = RequestConfigurationPrioritization::from($arr["relevanceModifiers"]);
        }
        if (array_key_exists("overriddenProductRecommendationRequestSettings", $arr))
        {
            $result->overriddenProductRecommendationRequestSettings = OverriddenProductRecommendationRequestSettings::hydrate($arr["overriddenProductRecommendationRequestSettings"]);
        }
        if (array_key_exists("overriddenContentRecommendationRequestSettings", $arr))
        {
            $result->overriddenContentRecommendationRequestSettings = OverriddenContentRecommendationRequestSettings::hydrate($arr["overriddenContentRecommendationRequestSettings"]);
        }
        return $result;
    }
    
    function setFilters(RequestConfigurationPrioritization $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setRelevanceModifiers(RequestConfigurationPrioritization $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
        return $this;
    }
    
    function setOverriddenProductRecommendationRequestSettings(OverriddenProductRecommendationRequestSettings $overriddenProductRecommendationRequestSettings)
    {
        $this->overriddenProductRecommendationRequestSettings = $overriddenProductRecommendationRequestSettings;
        return $this;
    }
    
    function setOverriddenContentRecommendationRequestSettings(OverriddenContentRecommendationRequestSettings $overriddenContentRecommendationRequestSettings)
    {
        $this->overriddenContentRecommendationRequestSettings = $overriddenContentRecommendationRequestSettings;
        return $this;
    }
}
