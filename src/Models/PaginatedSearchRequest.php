<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class PaginatedSearchRequest extends SearchRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.PaginatedSearchRequest, Relewise.Client";
    public int $skip;
    public int $take;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Search.ContentCategorySearchRequest, Relewise.Client")
        {
            return ContentCategorySearchRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.ContentSearchRequest, Relewise.Client")
        {
            return ContentSearchRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.ProductCategorySearchRequest, Relewise.Client")
        {
            return ProductCategorySearchRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.ProductSearchRequest, Relewise.Client")
        {
            return ProductSearchRequest::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = SearchRequest::hydrateBase($result, $arr);
        if (array_key_exists("skip", $arr))
        {
            $result->skip = $arr["skip"];
        }
        if (array_key_exists("take", $arr))
        {
            $result->take = $arr["take"];
        }
        return $result;
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
