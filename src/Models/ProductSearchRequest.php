<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductSearchRequest extends PaginatedSearchRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.ProductSearchRequest, Relewise.Client";
    
    public ?string $term;
    
    public ?ProductFacetQuery $facets;
    
    public ?ProductSearchSettings $settings;
    
    public ?ProductSortBySpecification $sorting;
    
    public ?RetailMediaQuery $retailMedia;
    
    public static function create(?Language $language, ?Currency $currency, User $user, string $displayedAtLocation, ?string $term, int $skip, int $take) : ProductSearchRequest
    {
        $result = new ProductSearchRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->user = $user;
        $result->displayedAtLocation = $displayedAtLocation;
        $result->term = $term;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductSearchRequest
    {
        $result = PaginatedSearchRequest::hydrateBase(new ProductSearchRequest(), $arr);
        if (array_key_exists("term", $arr))
        {
            $result->term = $arr["term"];
        }
        if (array_key_exists("facets", $arr))
        {
            $result->facets = ProductFacetQuery::hydrate($arr["facets"]);
        }
        if (array_key_exists("settings", $arr))
        {
            $result->settings = ProductSearchSettings::hydrate($arr["settings"]);
        }
        if (array_key_exists("sorting", $arr))
        {
            $result->sorting = ProductSortBySpecification::hydrate($arr["sorting"]);
        }
        if (array_key_exists("retailMedia", $arr))
        {
            $result->retailMedia = RetailMediaQuery::hydrate($arr["retailMedia"]);
        }
        return $result;
    }
    
    function setTerm(?string $term)
    {
        $this->term = $term;
        return $this;
    }
    
    function setFacets(?ProductFacetQuery $facets)
    {
        $this->facets = $facets;
        return $this;
    }
    
    function setSettings(?ProductSearchSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    
    function setSorting(?ProductSortBySpecification $sorting)
    {
        $this->sorting = $sorting;
        return $this;
    }
    
    function setRetailMedia(?RetailMediaQuery $retailMedia)
    {
        $this->retailMedia = $retailMedia;
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
