<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SavePredictionRulesResponse extends PredictionRuleSaveSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SavePredictionRulesResponse, Relewise.Client";
    public static function create(PredictionRule ... $rules) : SavePredictionRulesResponse
    {
        $result = new SavePredictionRulesResponse();
        $result->rules = $rules;
        return $result;
    }
    public static function hydrate(array $arr) : SavePredictionRulesResponse
    {
        $result = PredictionRuleSaveSearchRulesResponse::hydrateBase(new SavePredictionRulesResponse(), $arr);
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
     * Sets statistics to a new value.
     * @param Statistics $statistics new value.
     */
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
