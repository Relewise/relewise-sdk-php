<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class CustomProductRecommendationRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.CustomProductRecommendationRequest, Relewise.Client";
    public string $recommendationType;
    public ?array $parameters;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, string $recommendationType) : CustomProductRecommendationRequest
    {
        $result = new CustomProductRecommendationRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->recommendationType = $recommendationType;
        return $result;
    }
    public static function hydrate(array $arr) : CustomProductRecommendationRequest
    {
        $result = ProductRecommendationRequest::hydrateBase(new CustomProductRecommendationRequest(), $arr);
        if (array_key_exists("recommendationType", $arr))
        {
            $result->recommendationType = $arr["recommendationType"];
        }
        if (array_key_exists("parameters", $arr))
        {
            $result->parameters = array();
            foreach($arr["parameters"] as $key => $value)
            {
                $result->parameters[$key] = $value;
            }
        }
        return $result;
    }
    /**
     * Sets recommendationType to a new value.
     * @param string $recommendationType new value.
     */
    function setRecommendationType(string $recommendationType)
    {
        $this->recommendationType = $recommendationType;
        return $this;
    }
    /**
     * Sets the value of a specific key in parameters.
     * @param string $key index.
     * @param string $value new value.
     */
    function addToParameters(string $key, string $value)
    {
        if (!isset($this->parameters))
        {
            $this->parameters = array();
        }
        $this->parameters[$key] = $value;
        return $this;
    }
    /**
     * Sets parameters to a new value.
     * @param ?array<string, string> $parameters associative array.
     */
    function setParametersFromAssociativeArray(array $parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }
    /**
     * Sets settings to a new value.
     * @param ProductRecommendationRequestSettings $settings new value.
     */
    function setSettings(ProductRecommendationRequestSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    /**
     * Sets language to a new value.
     * @param ?Language $language new value.
     */
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * Sets user to a new value.
     * @param User $user new value.
     */
    function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
    /**
     * Sets relevanceModifiers to a new value.
     * @param RelevanceModifierCollection $relevanceModifiers new value.
     */
    function setRelevanceModifiers(RelevanceModifierCollection $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
        return $this;
    }
    /**
     * Sets filters to a new value.
     * @param FilterCollection $filters new value.
     */
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Sets displayedAtLocationType to a new value.
     * @param string $displayedAtLocationType new value.
     */
    function setDisplayedAtLocationType(string $displayedAtLocationType)
    {
        $this->displayedAtLocationType = $displayedAtLocationType;
        return $this;
    }
    /**
     * Sets currency to a new value.
     * @param ?Currency $currency new value.
     */
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
