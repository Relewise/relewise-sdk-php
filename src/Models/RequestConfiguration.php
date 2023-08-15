<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class RequestConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Merchandising.Configurations.RequestConfiguration, Relewise.Client";
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
    /**
     * Sets filters to a new value.
     * @param RequestConfigurationPrioritization $filters new value.
     */
    function setFilters(RequestConfigurationPrioritization $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Sets relevanceModifiers to a new value.
     * @param RequestConfigurationPrioritization $relevanceModifiers new value.
     */
    function setRelevanceModifiers(RequestConfigurationPrioritization $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
        return $this;
    }
    /**
     * Sets overriddenProductRecommendationRequestSettings to a new value.
     * @param OverriddenProductRecommendationRequestSettings $overriddenProductRecommendationRequestSettings new value.
     */
    function setOverriddenProductRecommendationRequestSettings(OverriddenProductRecommendationRequestSettings $overriddenProductRecommendationRequestSettings)
    {
        $this->overriddenProductRecommendationRequestSettings = $overriddenProductRecommendationRequestSettings;
        return $this;
    }
    /**
     * Sets overriddenContentRecommendationRequestSettings to a new value.
     * @param OverriddenContentRecommendationRequestSettings $overriddenContentRecommendationRequestSettings new value.
     */
    function setOverriddenContentRecommendationRequestSettings(OverriddenContentRecommendationRequestSettings $overriddenContentRecommendationRequestSettings)
    {
        $this->overriddenContentRecommendationRequestSettings = $overriddenContentRecommendationRequestSettings;
        return $this;
    }
}
