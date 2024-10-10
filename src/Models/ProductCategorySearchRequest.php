<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategorySearchRequest extends PaginatedSearchRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.ProductCategorySearchRequest, Relewise.Client";
    public ?string $term;
    
    public ?ProductCategorySearchSettings $settings;
    
    public ?ProductCategoryFacetQuery $facets;
    
    public ?ProductCategorySortBySpecification $sorting;
    
    public static function create(?Language $language, ?Currency $currency, User $user, string $displayedAtLocation, ?string $term, int $skip, int $take) : ProductCategorySearchRequest
    {
        $result = new ProductCategorySearchRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->user = $user;
        $result->displayedAtLocation = $displayedAtLocation;
        $result->term = $term;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductCategorySearchRequest
    {
        $result = PaginatedSearchRequest::hydrateBase(new ProductCategorySearchRequest(), $arr);
        if (array_key_exists("term", $arr))
        {
            $result->term = $arr["term"];
        }
        if (array_key_exists("settings", $arr))
        {
            $result->settings = ProductCategorySearchSettings::hydrate($arr["settings"]);
        }
        if (array_key_exists("facets", $arr))
        {
            $result->facets = ProductCategoryFacetQuery::hydrate($arr["facets"]);
        }
        if (array_key_exists("sorting", $arr))
        {
            $result->sorting = ProductCategorySortBySpecification::hydrate($arr["sorting"]);
        }
        return $result;
    }
    
    function setTerm(?string $term)
    {
        $this->term = $term;
        return $this;
    }
    
    function setSettings(?ProductCategorySearchSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    
    function setFacets(?ProductCategoryFacetQuery $facets)
    {
        $this->facets = $facets;
        return $this;
    }
    
    function setSorting(?ProductCategorySortBySpecification $sorting)
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
