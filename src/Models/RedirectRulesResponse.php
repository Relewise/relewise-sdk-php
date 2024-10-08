<?php declare(strict_types=1);

namespace Relewise\Models;

class RedirectRulesResponse extends RedirectRuleSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.RedirectRulesResponse, Relewise.Client";
    public static function create(array $rules, int $hits) : RedirectRulesResponse
    {
        $result = new RedirectRulesResponse();
        $result->rules = $rules;
        $result->hits = $hits;
        return $result;
    }
    
    public static function hydrate(array $arr) : RedirectRulesResponse
    {
        $result = RedirectRuleSearchRulesResponse::hydrateBase(new RedirectRulesResponse(), $arr);
        return $result;
    }
    
    function setRules(RedirectRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    
    /** @param RedirectRule[] $rules new value. */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    
    function addToRules(RedirectRule $rules)
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
