<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveDecompoundRulesRequest extends DecompoundRuleSaveSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SaveDecompoundRulesRequest, Relewise.Client";
    
    public static function create(string $modifiedBy) : SaveDecompoundRulesRequest
    {
        $result = new SaveDecompoundRulesRequest();
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveDecompoundRulesRequest
    {
        $result = DecompoundRuleSaveSearchRulesRequest::hydrateBase(new SaveDecompoundRulesRequest(), $arr);
        return $result;
    }
    
    function setRules(DecompoundRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    
    /** @param DecompoundRule[] $rules new value. */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    
    function addToRules(DecompoundRule $rules)
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
