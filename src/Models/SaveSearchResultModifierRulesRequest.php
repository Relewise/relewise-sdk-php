<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveSearchResultModifierRulesRequest extends SearchResultModifierRuleSaveSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SaveSearchResultModifierRulesRequest, Relewise.Client";
    public static function create(string $modifiedBy) : SaveSearchResultModifierRulesRequest
    {
        $result = new SaveSearchResultModifierRulesRequest();
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveSearchResultModifierRulesRequest
    {
        $result = SearchResultModifierRuleSaveSearchRulesRequest::hydrateBase(new SaveSearchResultModifierRulesRequest(), $arr);
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
    
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
