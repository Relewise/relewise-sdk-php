<?php declare(strict_types=1);

namespace Relewise\Models;

/** The search request shape establishes language-currency context with search filters, optional user info. Defines Language. Currency pair, as well as Filters (both PostFilters). Products search is done through - ProductSearchRequest Content search is done through - ContentSearchRequest Search term prediction is done through - SearchTermPredictionRequest */
abstract class SearchRequest extends LicensedRequest
{
    public string $typeDefinition = "";
    public ?Language $language;
    
    public ?Currency $currency;
    
    public ?User $user;
    
    public ?string $displayedAtLocation;
    
    public ?RelevanceModifierCollection $relevanceModifiers;
    
    public ?FilterCollection $filters;
    
    public ?SearchIndexSelector $indexSelector;
    
    public ?FilterCollection $postFilters;
    
    
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
        if ($type=="Relewise.Client.Requests.Search.SearchRequestCollection, Relewise.Client")
        {
            return SearchRequestCollection::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.SearchTermPredictionRequest, Relewise.Client")
        {
            return SearchTermPredictionRequest::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = LicensedRequest::hydrateBase($result, $arr);
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
        }
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("displayedAtLocation", $arr))
        {
            $result->displayedAtLocation = $arr["displayedAtLocation"];
        }
        if (array_key_exists("relevanceModifiers", $arr))
        {
            $result->relevanceModifiers = RelevanceModifierCollection::hydrate($arr["relevanceModifiers"]);
        }
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        if (array_key_exists("indexSelector", $arr))
        {
            $result->indexSelector = SearchIndexSelector::hydrate($arr["indexSelector"]);
        }
        if (array_key_exists("postFilters", $arr))
        {
            $result->postFilters = FilterCollection::hydrate($arr["postFilters"]);
        }
        return $result;
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
