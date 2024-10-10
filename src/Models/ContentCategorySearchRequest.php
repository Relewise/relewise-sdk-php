<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentCategorySearchRequest extends PaginatedSearchRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.ContentCategorySearchRequest, Relewise.Client";
    
    public string $term;
    public ?ContentCategorySearchSettings $settings;
    public static function create(?Language $language, ?Currency $currency, User $user, string $displayedAtLocation, string $term, int $skip, int $take) : ContentCategorySearchRequest
    {
        $result = new ContentCategorySearchRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->user = $user;
        $result->displayedAtLocation = $displayedAtLocation;
        $result->term = $term;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentCategorySearchRequest
    {
        $result = PaginatedSearchRequest::hydrateBase(new ContentCategorySearchRequest(), $arr);
        if (array_key_exists("term", $arr))
        {
            $result->term = $arr["term"];
        }
        if (array_key_exists("settings", $arr))
        {
            $result->settings = ContentCategorySearchSettings::hydrate($arr["settings"]);
        }
        return $result;
    }
    
    function setTerm(string $term)
    {
        $this->term = $term;
        return $this;
    }
    
    function setSettings(?ContentCategorySearchSettings $settings)
    {
        $this->settings = $settings;
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
