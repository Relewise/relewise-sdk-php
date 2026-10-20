<?php declare(strict_types=1);

namespace Relewise\Models;

use JsonSerializable;

class SearchTermPredictionRequest extends SearchRequest implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.SearchTermPredictionRequest, Relewise.Client";
    public string $term;
    public int $take;
    public ?SearchTermPredictionSettings $settings;
    
    public static function create(?Language $language, ?Currency $currency, User $user, string $displayedAtLocation, string $term, int $take) : SearchTermPredictionRequest
    {
        $result = new SearchTermPredictionRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->user = $user;
        $result->displayedAtLocation = $displayedAtLocation;
        $result->term = $term;
        $result->take = $take;
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchTermPredictionRequest
    {
        $result = SearchRequest::hydrateBase(new SearchTermPredictionRequest(), $arr);
        if (array_key_exists("term", $arr))
        {
            $result->term = $arr["term"];
        }
        if (array_key_exists("take", $arr))
        {
            $result->take = $arr["take"];
        }
        if (array_key_exists("settings", $arr))
        {
            $result->settings = SearchTermPredictionSettings::hydrate($arr["settings"]);
        }
        return $result;
    }
    
    function setTerm(string $term)
    {
        $this->term = $term;
        return $this;
    }
    
    function setTake(int $take)
    {
        $this->take = $take;
        return $this;
    }
    
    function setSettings(?SearchTermPredictionSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    
    function setDisplayedAtLocation(?string $displayedAtLocation)
    {
        $this->displayedAtLocation = $displayedAtLocation;
        return $this;
    }
    
    function setRelevanceModifiers(?RelevanceModifierCollection $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
        return $this;
    }
    
    function setFilters(?FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setIndexSelector(?SearchIndexSelector $indexSelector)
    {
        $this->indexSelector = $indexSelector;
        return $this;
    }
    
    function setPostFilters(?FilterCollection $postFilters)
    {
        $this->postFilters = $postFilters;
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
