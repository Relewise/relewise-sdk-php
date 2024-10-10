<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchResultModifierRulesResponse extends SearchResultModifierRuleSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SearchResultModifierRulesResponse, Relewise.Client";
    public static function create(array $rules, int $hits) : SearchResultModifierRulesResponse
    {
        $result = new SearchResultModifierRulesResponse();
        $result->rules = $rules;
        $result->hits = $hits;
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchResultModifierRulesResponse
    {
        $result = SearchResultModifierRuleSearchRulesResponse::hydrateBase(new SearchResultModifierRulesResponse(), $arr);
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
