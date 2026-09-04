<?php declare(strict_types=1);

namespace Relewise\Models;

/** Creates or updates synonym rules. */
class SaveSynonymRulesRequest extends SynonymRuleSaveSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SaveSynonymRulesRequest, Relewise.Client";
    public static function create(string $modifiedBy) : SaveSynonymRulesRequest
    {
        $result = new SaveSynonymRulesRequest();
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveSynonymRulesRequest
    {
        $result = SynonymRuleSaveSearchRulesRequest::hydrateBase(new SaveSynonymRulesRequest(), $arr);
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
    
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
