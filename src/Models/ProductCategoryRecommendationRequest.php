<?php declare(strict_types=1);

namespace Relewise\Models;

use JsonSerializable;

abstract class ProductCategoryRecommendationRequest extends RecommendationRequest implements JsonSerializable
{
    public string $typeDefinition = "";
    public ProductCategoryRecommendationRequestSettings $settings;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Recommendations.PersonalProductCategoryRecommendationRequest, Relewise.Client")
        {
            return PersonalProductCategoryRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PopularProductCategoriesRecommendationRequest, Relewise.Client")
        {
            return PopularProductCategoriesRecommendationRequest::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = RecommendationRequest::hydrateBase($result, $arr);
        if (array_key_exists("settings", $arr))
        {
            $result->settings = ProductCategoryRecommendationRequestSettings::hydrate($arr["settings"]);
        }
        return $result;
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
    
    function addToContextValues(string $key, string $value)
    {
        if (!isset($this->contextValues))
        {
            $this->contextValues = array();
        }
        $this->contextValues[$key] = $value;
        return $this;
    }
    
    /** @param ?array<string, string> $contextValues associative array. */
    function setContextValuesFromAssociativeArray(array $contextValues)
    {
        $this->contextValues = $contextValues;
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        $result = array();
        foreach ((array) $this as $name => $value)
        {
            // Private and protected property names contain a NUL byte when cast to an array.
            if (!str_contains((string) $name, "\0"))
            {
                $result[$name] = $value;
            }
        }
        if (isset($this->contextValues))
        {
            $result["contextValues"] = (object) $this->contextValues;
        }
        return (object) $result;
    }
}
