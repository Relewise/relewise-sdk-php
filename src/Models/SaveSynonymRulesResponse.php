<?php declare(strict_types=1);

namespace Relewise\Models;

/** Contains synonym rules after they have been saved. */
class SaveSynonymRulesResponse extends SynonymRuleSaveSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SaveSynonymRulesResponse, Relewise.Client";
    public static function create(SynonymRule ... $rules) : SaveSynonymRulesResponse
    {
        $result = new SaveSynonymRulesResponse();
        $result->rules = $rules;
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveSynonymRulesResponse
    {
        $result = SynonymRuleSaveSearchRulesResponse::hydrateBase(new SaveSynonymRulesResponse(), $arr);
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
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
