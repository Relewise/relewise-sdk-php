<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentSearchRequest extends PaginatedSearchRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.ContentSearchRequest, Relewise.Client";
    public ?string $term;
    public ?ContentFacetQuery $facets;
    public ?ContentSearchSettings $settings;
    public ?ContentSortBySpecification $sorting;
    public static function create(?Language $language, ?Currency $currency, User $user, string $displayedAtLocation, ?string $term, int $skip, int $take) : ContentSearchRequest
    {
        $result = new ContentSearchRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->user = $user;
        $result->displayedAtLocation = $displayedAtLocation;
        $result->term = $term;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    public static function hydrate(array $arr) : ContentSearchRequest
    {
        $result = PaginatedSearchRequest::hydrateBase(new ContentSearchRequest(), $arr);
        if (array_key_exists("term", $arr))
        {
            $result->term = $arr["term"];
        }
        if (array_key_exists("facets", $arr))
        {
            $result->facets = ContentFacetQuery::hydrate($arr["facets"]);
        }
        if (array_key_exists("settings", $arr))
        {
            $result->settings = ContentSearchSettings::hydrate($arr["settings"]);
        }
        if (array_key_exists("sorting", $arr))
        {
            $result->sorting = ContentSortBySpecification::hydrate($arr["sorting"]);
        }
        return $result;
    }
    
    function setTerm(?string $term)
    {
        $this->term = $term;
        return $this;
    }
    
    function setFacets(?ContentFacetQuery $facets)
    {
        $this->facets = $facets;
        return $this;
    }
    
    function setSettings(?ContentSearchSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    
    function setSorting(?ContentSortBySpecification $sorting)
    {
        $this->sorting = $sorting;
        return $this;
    }
    
    function setSkip(int $skip)
    {
        $this->skip = $skip;
        return $this;
    }
    
    function setTake(int $take)
    {
        $this->take = $take;
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
}
