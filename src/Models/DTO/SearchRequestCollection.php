<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SearchRequestCollection extends SearchRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.SearchRequestCollection, Relewise.Client";
    public array $requests;
    public static function create(SearchRequest ... $requests) : SearchRequestCollection
    {
        $result = new SearchRequestCollection();
        $result->requests = $requests;
        return $result;
    }
    public static function hydrate(array $arr) : SearchRequestCollection
    {
        $result = SearchRequest::hydrateBase(new SearchRequestCollection(), $arr);
        if (array_key_exists("requests", $arr))
        {
            $result->requests = array();
            foreach($arr["requests"] as &$value)
            {
                array_push($result->requests, SearchRequest::hydrate($value));
            }
        }
        return $result;
    }
    function withRequests(SearchRequest ... $requests)
    {
        $this->requests = $requests;
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
}
