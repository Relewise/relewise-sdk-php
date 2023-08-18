<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class PredictionRuleSaveSearchRulesResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SaveSearchRulesResponse`1[[Relewise.Client.DataTypes.Search.Configuration.SearchRules.PredictionRule, Relewise.Client, Version=1.61.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
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
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
