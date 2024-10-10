<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchTermModifierRulesResponse extends SearchTermModifierRuleSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SearchTermModifierRulesResponse, Relewise.Client";
    public static function create(array $rules, int $hits) : SearchTermModifierRulesResponse
    {
        $result = new SearchTermModifierRulesResponse();
        $result->rules = $rules;
        $result->hits = $hits;
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchTermModifierRulesResponse
    {
        $result = SearchTermModifierRuleSearchRulesResponse::hydrateBase(new SearchTermModifierRulesResponse(), $arr);
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
