<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class PredictionRuleSaveSearchRulesResponse extends TimedResponse
{
    public string $typeDefinition = "";
    public array $rules;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Search.Rules.SavePredictionRulesResponse, Relewise.Client")
        {
            return SavePredictionRulesResponse::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = TimedResponse::hydrateBase($result, $arr);
        if (array_key_exists("rules", $arr))
        {
            $result->rules = array();
            foreach($arr["rules"] as &$value)
            {
                array_push($result->rules, PredictionRule::hydrate($value));
            }
        }
        return $result;
    }
    function setRules(PredictionRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /** @param PredictionRule[] $rules new value. */
    function setRulesFromArray(array $rules)
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
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
