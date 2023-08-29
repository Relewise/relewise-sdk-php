<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SaveSearchTermModifierRulesRequest extends SearchTermModifierRuleSaveSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SaveSearchTermModifierRulesRequest, Relewise.Client";
    public static function create(string $modifiedBy) : SaveSearchTermModifierRulesRequest
    {
        $result = new SaveSearchTermModifierRulesRequest();
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    public static function hydrate(array $arr) : SaveSearchTermModifierRulesRequest
    {
        $result = SearchTermModifierRuleSaveSearchRulesRequest::hydrateBase(new SaveSearchTermModifierRulesRequest(), $arr);
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
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
