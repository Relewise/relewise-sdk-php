<?php declare(strict_types=1);

namespace Relewise\Models;

class DecompoundRulesRequest extends DecompoundRulesRequestSortBySearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.DecompoundRulesRequest, Relewise.Client";
    public static function create(SearchRuleFilters $filters, DecompoundRulesRequestSortBySorting $sorting, int $skip, int $take) : DecompoundRulesRequest
    {
        $result = new DecompoundRulesRequest();
        $result->filters = $filters;
        $result->sorting = $sorting;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    
    public static function hydrate(array $arr) : DecompoundRulesRequest
    {
        $result = DecompoundRulesRequestSortBySearchRulesRequest::hydrateBase(new DecompoundRulesRequest(), $arr);
        return $result;
    }
    
    function setFilters(SearchRuleFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setSorting(DecompoundRulesRequestSortBySorting $sorting)
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
