<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class PredictionRulesRequest extends PredictionRulesRequestSortBySearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.PredictionRulesRequest, Relewise.Client";
    public static function create() : PredictionRulesRequest
    {
        $result = new PredictionRulesRequest();
        return $result;
    }
    public static function hydrate(array $arr) : PredictionRulesRequest
    {
        $result = PredictionRulesRequestSortBySearchRulesRequest::hydrateBase(new PredictionRulesRequest(), $arr);
        return $result;
    }
    function setFilters(SearchRuleFilters $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function setSorting(PredictionRulesRequestSortBySorting $sorting)
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
