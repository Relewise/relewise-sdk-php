<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SaveStemmingRulesRequest extends StemmingRuleSaveSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SaveStemmingRulesRequest, Relewise.Client";
    public static function create(string $modifiedBy) : SaveStemmingRulesRequest
    {
        $result = new SaveStemmingRulesRequest();
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    public static function hydrate(array $arr) : SaveStemmingRulesRequest
    {
        $result = StemmingRuleSaveSearchRulesRequest::hydrateBase(new SaveStemmingRulesRequest(), $arr);
        return $result;
    }
    function setRules(StemmingRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /** @param StemmingRule[] $rules new value. */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function addToRules(StemmingRule $rules)
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
