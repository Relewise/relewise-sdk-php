<?php declare(strict_types=1);

namespace Relewise\Models;

class RedirectRulesRequest extends RedirectRulesRequestSortBySearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.RedirectRulesRequest, Relewise.Client";
    public static function create(SearchRuleFilters $filters, RedirectRulesRequestSortBySorting $sorting, int $skip, int $take) : RedirectRulesRequest
    {
        $result = new RedirectRulesRequest();
        $result->filters = $filters;
        $result->sorting = $sorting;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    public static function hydrate(array $arr) : RedirectRulesRequest
    {
        $result = RedirectRulesRequestSortBySearchRulesRequest::hydrateBase(new RedirectRulesRequest(), $arr);
        return $result;
    }
    
    function setFilters(SearchRuleFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setSorting(RedirectRulesRequestSortBySorting $sorting)
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
