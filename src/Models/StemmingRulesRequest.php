<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class StemmingRulesRequest extends StemmingRulesRequestSortBySearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.StemmingRulesRequest, Relewise.Client";
    public static function create(SearchRuleFilters $filters, StemmingRulesRequestSortBySorting $sorting, int $skip, int $take) : StemmingRulesRequest
    {
        $result = new StemmingRulesRequest();
        $result->filters = $filters;
        $result->sorting = $sorting;
        $result->skip = $skip;
        $result->take = $take;
        return $result;
    }
    public static function hydrate(array $arr) : StemmingRulesRequest
    {
        $result = StemmingRulesRequestSortBySearchRulesRequest::hydrateBase(new StemmingRulesRequest(), $arr);
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
     * @param StemmingRulesRequestSortBySorting $sorting new value.
     */
    function setSorting(StemmingRulesRequestSortBySorting $sorting)
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
