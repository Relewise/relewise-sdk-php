<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
    /**
     * Sets filters to a new value.
     * @param SearchRuleFilters $filters new value.
     */
    function setFilters(SearchRuleFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Sets sorting to a new value.
     * @param RedirectRulesRequestSortBySorting $sorting new value.
     */
    function setSorting(RedirectRulesRequestSortBySorting $sorting)
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
}
