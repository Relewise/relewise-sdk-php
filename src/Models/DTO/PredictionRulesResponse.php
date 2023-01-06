<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class PredictionRulesResponse extends PredictionRuleSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.PredictionRulesResponse, Relewise.Client";
    public static function create() : PredictionRulesResponse
    {
        $result = new PredictionRulesResponse();
        return $result;
    }
    public static function hydrate(array $arr) : PredictionRulesResponse
    {
        $result = PredictionRuleSearchRulesResponse::hydrateBase(new PredictionRulesResponse(), $arr);
        return $result;
    }
    function setRules(PredictionRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
