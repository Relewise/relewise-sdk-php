<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class PredictionRulesResponse extends PredictionRuleSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.PredictionRulesResponse, Relewise.Client";
    public static function create(array $rules, int $hits) : PredictionRulesResponse
    {
        $result = new PredictionRulesResponse();
        $result->rules = $rules;
        $result->hits = $hits;
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
    function addToRules(PredictionRule $rules)
    {
        if (!isset($this->rules))
        {
            $this->rules = array();
        }
        array_push($this->rules, $rules);
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
