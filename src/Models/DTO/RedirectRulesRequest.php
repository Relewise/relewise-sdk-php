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
    function withFilters(SearchRuleFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function withSorting(RedirectRulesRequestSortBySorting $sorting)
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
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
