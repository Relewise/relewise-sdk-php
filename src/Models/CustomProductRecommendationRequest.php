<?php declare(strict_types=1);

namespace Relewise\Models;

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
    function setRecommendationType(string $recommendationType)
    {
        $this->recommendationType = $recommendationType;
        return $this;
    }
    function addToParameters(string $key, string $value)
    {
        if (!isset($this->parameters))
        {
            $this->parameters = array();
        }
        $this->parameters[$key] = $value;
        return $this;
    }
    /** @param ?array<string, string> $parameters associative array. */
    function setParametersFromAssociativeArray(array $parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }
    function setSettings(ProductRecommendationRequestSettings $settings)
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
