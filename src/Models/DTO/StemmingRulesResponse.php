<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class StemmingRulesResponse extends StemmingRuleSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.StemmingRulesResponse, Relewise.Client";
    public static function create() : StemmingRulesResponse
    {
        $result = new StemmingRulesResponse();
        return $result;
    }
    public static function hydrate(array $arr) : StemmingRulesResponse
    {
        $result = StemmingRuleSearchRulesResponse::hydrateBase(new StemmingRulesResponse(), $arr);
        return $result;
    }
    function setRules(StemmingRule ... $rules)
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
