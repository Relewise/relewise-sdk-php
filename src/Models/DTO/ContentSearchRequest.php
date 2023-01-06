<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

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
    function withTerm(?string $term)
    {
        $this->term = $term;
        return $this;
    }
    function withFacets(?ContentFacetQuery $facets)
    {
        $this->facets = $facets;
        return $this;
    }
    function withSettings(?ContentSearchSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    function withSorting(?ContentSortBySpecification $sorting)
    {
        $this->sorting = $sorting;
        return $this;
    }
    function withSkip(int $skip)
    {
        $this->skip = $skip;
        return $this;
    }
    function withTake(int $take)
    {
        $this->take = $take;
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
