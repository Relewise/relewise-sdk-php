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
    /**
     * Sets rules to a new value.
     * @param StemmingRule[] $rules new value.
     */
    function setRules(StemmingRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /**
     * Sets rules to a new value from an array.
     * @param StemmingRule[] $rules new value.
     */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /**
     * Adds a new element to rules.
     * @param StemmingRule $rules new element.
     */
    function addToRules(StemmingRule $rules)
    {
        if (!isset($this->rules))
        {
            $this->rules = array();
        }
        array_push($this->rules, $rules);
        return $this;
    }
    /**
     * Sets hits to a new value.
     * @param int $hits new value.
     */
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    /**
     * Sets statistics to a new value.
     * @param Statistics $statistics new value.
     */
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
