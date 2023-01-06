<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class RedirectRulesRequest extends RedirectRulesRequestSortBySearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.RedirectRulesRequest, Relewise.Client";
    public static function create() : RedirectRulesRequest
    {
        $result = new RedirectRulesRequest();
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
