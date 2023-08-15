<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets term to a new value.
     * @param ?string $term new value.
     */
    function setTerm(?string $term)
    {
        $this->term = $term;
        return $this;
    }
    /**
     * Sets settings to a new value.
     * @param ?ProductCategorySearchSettings $settings new value.
     */
    function setSettings(?ProductCategorySearchSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    /**
     * Sets facets to a new value.
     * @param ?ProductCategoryFacetQuery $facets new value.
     */
    function setFacets(?ProductCategoryFacetQuery $facets)
    {
        $this->facets = $facets;
        return $this;
    }
    /**
     * Sets sorting to a new value.
     * @param ?ProductCategorySortBySpecification $sorting new value.
     */
    function setSorting(?ProductCategorySortBySpecification $sorting)
    {
        $this->sorting = $sorting;
        return $this;
    }
    /**
     * Sets skip to a new value.
     * @param int $skip new value.
     */
    function setSkip(int $skip)
    {
        $this->skip = $skip;
        return $this;
    }
    /**
     * Sets take to a new value.
     * @param int $take new value.
     */
    function setTake(int $take)
    {
        $this->take = $take;
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
