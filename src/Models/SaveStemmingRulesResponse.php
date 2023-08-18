<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SaveStemmingRulesResponse extends StemmingRuleSaveSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SaveStemmingRulesResponse, Relewise.Client";
    public static function create(StemmingRule ... $rules) : SaveStemmingRulesResponse
    {
        $result = new SaveStemmingRulesResponse();
        $result->rules = $rules;
        return $result;
    }
    public static function hydrate(array $arr) : SaveStemmingRulesResponse
    {
        $result = StemmingRuleSaveSearchRulesResponse::hydrateBase(new SaveStemmingRulesResponse(), $arr);
        return $result;
    }
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
    function addToRules(StemmingRule $rules)
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
