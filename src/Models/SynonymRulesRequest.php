<?php declare(strict_types=1);

namespace Relewise\Models;

/** Requests a filtered, sorted, and paged set of synonym rules. */
class SynonymRulesRequest extends SynonymRulesRequestSortBySearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SynonymRulesRequest, Relewise.Client";
    public static function create(SearchRuleFilters $filters, SynonymRulesRequestSortBySorting $sorting, int $skip, int $take) : SynonymRulesRequest
    {
        $result = new SynonymRulesRequest();
        $result->filters = $filters;
        $result->sorting = $sorting;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    
    public static function hydrate(array $arr) : SynonymRulesRequest
    {
        $result = SynonymRulesRequestSortBySearchRulesRequest::hydrateBase(new SynonymRulesRequest(), $arr);
        return $result;
    }
    
    function setFilters(SearchRuleFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setSorting(SynonymRulesRequestSortBySorting $sorting)
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
