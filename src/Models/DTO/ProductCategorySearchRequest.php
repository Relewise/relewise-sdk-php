<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

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
    function withTerm(?string $term)
    {
        $this->term = $term;
        return $this;
    }
    function withSettings(?ProductCategorySearchSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    function withFacets(?ProductCategoryFacetQuery $facets)
    {
        $this->facets = $facets;
        return $this;
    }
    function withSorting(?ProductCategorySortBySpecification $sorting)
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
