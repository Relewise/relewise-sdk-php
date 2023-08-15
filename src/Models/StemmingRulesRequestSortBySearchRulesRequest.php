<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class StemmingRulesRequestSortBySearchRulesRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SearchRulesRequest`1[[Relewise.Client.Requests.Search.Rules.StemmingRulesRequest+SortBy, Relewise.Client, Version=1.61.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public SearchRuleFilters $filters;
    public StemmingRulesRequestSortBySorting $sorting;
    public int $skip;
    public int $take;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Search.Rules.StemmingRulesRequest, Relewise.Client")
        {
            return StemmingRulesRequest::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = LicensedRequest::hydrateBase($result, $arr);
        if (array_key_exists("filters", $arr))
        {
            $result->filters = SearchRuleFilters::hydrate($arr["filters"]);
        }
        if (array_key_exists("sorting", $arr))
        {
            $result->sorting = StemmingRulesRequestSortBySorting::hydrate($arr["sorting"]);
        }
        if (array_key_exists("skip", $arr))
        {
            $result->skip = $arr["skip"];
        }
        if (array_key_exists("take", $arr))
        {
            $result->take = $arr["take"];
        }
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
