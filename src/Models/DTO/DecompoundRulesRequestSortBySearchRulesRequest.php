<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class DecompoundRulesRequestSortBySearchRulesRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SearchRulesRequest`1[[Relewise.Client.Requests.Search.Rules.DecompoundRulesRequest+SortBy, Relewise.Client, Version=1.56.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public SearchRuleFilters $filters;
    public DecompoundRulesRequestSortBySorting $sorting;
    public int $skip;
    public int $take;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Search.Rules.DecompoundRulesRequest, Relewise.Client")
        {
            return DecompoundRulesRequest::hydrate($arr);
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
            $result->sorting = DecompoundRulesRequestSortBySorting::hydrate($arr["sorting"]);
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
    function withFilters(SearchRuleFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function withSorting(DecompoundRulesRequestSortBySorting $sorting)
    {
        $this->sorting = $sorting;
        return $this;
    }
    function withSkip(int $skip)
    {
        $this->skip = $skip;
        return $this;
    }
    function withTake(int $take)
    {
        $this->take = $take;
        return $this;
    }
}
