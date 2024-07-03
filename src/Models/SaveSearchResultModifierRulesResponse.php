<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveSearchResultModifierRulesResponse extends SearchResultModifierRuleSaveSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SaveSearchResultModifierRulesResponse, Relewise.Client";
    public static function create(SearchResultModifierRule ... $rules) : SaveSearchResultModifierRulesResponse
    {
        $result = new SaveSearchResultModifierRulesResponse();
        $result->rules = $rules;
        return $result;
    }
    public static function hydrate(array $arr) : SaveSearchResultModifierRulesResponse
    {
        $result = SearchResultModifierRuleSaveSearchRulesResponse::hydrateBase(new SaveSearchResultModifierRulesResponse(), $arr);
        return $result;
    }
    function setRules(SearchResultModifierRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /** @param SearchResultModifierRule[] $rules new value. */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function addToRules(SearchResultModifierRule $rules)
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
