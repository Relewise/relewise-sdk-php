<?php declare(strict_types=1);

namespace Relewise\Models;

/** Contains synonym rules returned by the Search Rules API. */
class SynonymRulesResponse extends SynonymRuleSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SynonymRulesResponse, Relewise.Client";
    public static function create(array $rules, int $hits) : SynonymRulesResponse
    {
        $result = new SynonymRulesResponse();
        $result->rules = $rules;
        $result->hits = $hits;
        return $result;
    }
    
    public static function hydrate(array $arr) : SynonymRulesResponse
    {
        $result = SynonymRuleSearchRulesResponse::hydrateBase(new SynonymRulesResponse(), $arr);
        return $result;
    }
    
    function setRules(SynonymRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    
    /** @param SynonymRule[] $rules new value. */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    
    function addToRules(SynonymRule $rules)
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
