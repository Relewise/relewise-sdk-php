<?php declare(strict_types=1);

namespace Relewise\Models;

use JsonSerializable;

/** The search request shape establishes language-currency context with search filters, optional user info. Defines Language. Currency pair, as well as Filters (both PostFilters). Products search is done through - ProductSearchRequest Content search is done through - ContentSearchRequest Search term prediction is done through - SearchTermPredictionRequest */
abstract class SearchRequest extends LicensedRequest implements JsonSerializable
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
    /** Context values used to determine which merchandising rules apply to this request, such as DeviceType=Mobile or SplitTestVariant=A. */
    public ?array $contextValues;
    
    
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
        if (array_key_exists("contextValues", $arr))
        {
            $result->contextValues = array();
            foreach($arr["contextValues"] as $key => $value)
            {
                $result->contextValues[$key] = $value;
            }
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
    
    /** Context values used to determine which merchandising rules apply to this request, such as DeviceType=Mobile or SplitTestVariant=A. */
    function addToContextValues(string $key, string $value)
    {
        if (!isset($this->contextValues))
        {
            $this->contextValues = array();
        }
        $this->contextValues[$key] = $value;
        return $this;
    }
    
    /**
     * Context values used to determine which merchandising rules apply to this request, such as DeviceType=Mobile or SplitTestVariant=A.
     * @param ?array<string, string> $contextValues associative array.
     */
    function setContextValuesFromAssociativeArray(array $contextValues)
    {
        $this->contextValues = $contextValues;
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        $result = array();
        foreach ((array) $this as $name => $value)
        {
            // Private and protected property names contain a NUL byte when cast to an array.
            if (!str_contains((string) $name, "\0"))
            {
                $result[$name] = $value;
            }
        }
        if (isset($this->contextValues))
        {
            $result["contextValues"] = (object) $this->contextValues;
        }
        return (object) $result;
    }
}
