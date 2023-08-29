<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SaveSearchTermModifierRulesResponse extends SearchTermModifierRuleSaveSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SaveSearchTermModifierRulesResponse, Relewise.Client";
    public static function create(SearchTermModifierRule ... $rules) : SaveSearchTermModifierRulesResponse
    {
        $result = new SaveSearchTermModifierRulesResponse();
        $result->rules = $rules;
        return $result;
    }
    public static function hydrate(array $arr) : SaveSearchTermModifierRulesResponse
    {
        $result = SearchTermModifierRuleSaveSearchRulesResponse::hydrateBase(new SaveSearchTermModifierRulesResponse(), $arr);
        return $result;
    }
    function setRules(SearchTermModifierRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /** @param SearchTermModifierRule[] $rules new value. */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function addToRules(SearchTermModifierRule $rules)
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
