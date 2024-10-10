<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchTermModifierRulesRequest extends SearchTermModifierRulesRequestSortBySearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SearchTermModifierRulesRequest, Relewise.Client";
    public static function create(SearchRuleFilters $filters, SearchTermModifierRulesRequestSortBySorting $sorting, int $skip, int $take) : SearchTermModifierRulesRequest
    {
        $result = new SearchTermModifierRulesRequest();
        $result->filters = $filters;
        $result->sorting = $sorting;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchTermModifierRulesRequest
    {
        $result = SearchTermModifierRulesRequestSortBySearchRulesRequest::hydrateBase(new SearchTermModifierRulesRequest(), $arr);
        return $result;
    }
    
    function setFilters(SearchRuleFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setSorting(SearchTermModifierRulesRequestSortBySorting $sorting)
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
