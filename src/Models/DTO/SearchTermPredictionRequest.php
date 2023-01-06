<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SearchTermPredictionRequest extends SearchRequest
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
    function withTerm(string $term)
    {
        $this->term = $term;
        return $this;
    }
    function withTake(int $take)
    {
        $this->take = $take;
        return $this;
    }
    function withSettings(?SearchTermPredictionSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    function withLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function withCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    function withUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    function withDisplayedAtLocation(?string $displayedAtLocation)
    {
        $this->displayedAtLocation = $displayedAtLocation;
        return $this;
    }
    function withRelevanceModifiers(?RelevanceModifierCollection $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
        return $this;
    }
    function withFilters(?FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function withIndexSelector(?SearchIndexSelector $indexSelector)
    {
        $this->indexSelector = $indexSelector;
        return $this;
    }
    function withPostFilters(?FilterCollection $postFilters)
    {
        $this->postFilters = $postFilters;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
