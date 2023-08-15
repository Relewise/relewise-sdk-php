<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
     * @param DecompoundRulesRequestSortBySorting $sorting new value.
     */
    function setSorting(DecompoundRulesRequestSortBySorting $sorting)
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
