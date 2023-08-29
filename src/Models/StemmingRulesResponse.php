<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class StemmingRulesResponse extends StemmingRuleSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.StemmingRulesResponse, Relewise.Client";
    public static function create(array $rules, int $hits) : StemmingRulesResponse
    {
        $result = new StemmingRulesResponse();
        $result->rules = $rules;
        $result->hits = $hits;
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
    /** @param StemmingRule[] $rules new value. */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function addToRules(StemmingRule $rules)
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
