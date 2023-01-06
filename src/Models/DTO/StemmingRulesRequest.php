<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class StemmingRulesRequest extends StemmingRulesRequestSortBySearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.StemmingRulesRequest, Relewise.Client";
    public static function create() : StemmingRulesRequest
    {
        $result = new StemmingRulesRequest();
        return $result;
    }
    public static function hydrate(array $arr) : StemmingRulesRequest
    {
        $result = StemmingRulesRequestSortBySearchRulesRequest::hydrateBase(new StemmingRulesRequest(), $arr);
        return $result;
    }
    function setFilters(SearchRuleFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function setSorting(StemmingRulesRequestSortBySorting $sorting)
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
