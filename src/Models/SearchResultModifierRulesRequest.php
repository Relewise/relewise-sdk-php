<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchResultModifierRulesRequest extends SearchResultModifierRulesRequestSortBySearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SearchResultModifierRulesRequest, Relewise.Client";
    
    public static function create(SearchRuleFilters $filters, SearchResultModifierRulesRequestSortBySorting $sorting, int $skip, int $take) : SearchResultModifierRulesRequest
    {
        $result = new SearchResultModifierRulesRequest();
        $result->filters = $filters;
        $result->sorting = $sorting;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchResultModifierRulesRequest
    {
        $result = SearchResultModifierRulesRequestSortBySearchRulesRequest::hydrateBase(new SearchResultModifierRulesRequest(), $arr);
        return $result;
    }
    
    function setFilters(SearchRuleFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setSorting(SearchResultModifierRulesRequestSortBySorting $sorting)
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
}
