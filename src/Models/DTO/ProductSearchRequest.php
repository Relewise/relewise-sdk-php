<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductSearchRequest extends PaginatedSearchRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.ProductSearchRequest, Relewise.Client";
    public ?string $term;
    public ?ProductFacetQuery $facets;
    public ?ProductSearchSettings $settings;
    public ?ProductSortBySpecification $sorting;
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
        return $result;
    }
    function withTerm(?string $term)
    {
        $this->term = $term;
        return $this;
    }
    function withFacets(?ProductFacetQuery $facets)
    {
        $this->facets = $facets;
        return $this;
    }
    function withSettings(?ProductSearchSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    function withSorting(?ProductSortBySpecification $sorting)
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
