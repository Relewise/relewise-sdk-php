<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets requests to a new value.
     * @param SearchRequest[] $requests new value.
     */
    function setRequests(SearchRequest ... $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    /**
     * Sets requests to a new value from an array.
     * @param SearchRequest[] $requests new value.
     */
    function setRequestsFromArray(array $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    /**
     * Adds a new element to requests.
     * @param SearchRequest $requests new element.
     */
    function addToRequests(SearchRequest $requests)
    {
        if (!isset($this->requests))
        {
            $this->requests = array();
        }
        array_push($this->requests, $requests);
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
     * Sets currency to a new value.
     * @param ?Currency $currency new value.
     */
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    /**
     * Sets user to a new value.
     * @param ?User $user new value.
     */
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    /**
     * Sets displayedAtLocation to a new value.
     * @param ?string $displayedAtLocation new value.
     */
    function setDisplayedAtLocation(?string $displayedAtLocation)
    {
        $this->displayedAtLocation = $displayedAtLocation;
        return $this;
    }
    /**
     * Sets relevanceModifiers to a new value.
     * @param ?RelevanceModifierCollection $relevanceModifiers new value.
     */
    function setRelevanceModifiers(?RelevanceModifierCollection $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
        return $this;
    }
    /**
     * Sets filters to a new value.
     * @param ?FilterCollection $filters new value.
     */
    function setFilters(?FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Sets indexSelector to a new value.
     * @param ?SearchIndexSelector $indexSelector new value.
     */
    function setIndexSelector(?SearchIndexSelector $indexSelector)
    {
        $this->indexSelector = $indexSelector;
        return $this;
    }
    /**
     * Sets postFilters to a new value.
     * @param ?FilterCollection $postFilters new value.
     */
    function setPostFilters(?FilterCollection $postFilters)
    {
        $this->postFilters = $postFilters;
        return $this;
    }
}
