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
    /**
     * Sets rules to a new value.
     * @param PredictionRule[] $rules new value.
     */
    function setRules(PredictionRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /**
     * Sets rules to a new value from an array.
     * @param PredictionRule[] $rules new value.
     */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /**
     * Adds a new element to rules.
     * @param PredictionRule $rules new element.
     */
    function addToRules(PredictionRule $rules)
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
