<?php declare(strict_types=1);

namespace Relewise\Models;

class SavePredictionRulesRequest extends PredictionRuleSaveSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SavePredictionRulesRequest, Relewise.Client";
    public static function create(string $modifiedBy) : SavePredictionRulesRequest
    {
        $result = new SavePredictionRulesRequest();
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    public static function hydrate(array $arr) : SavePredictionRulesRequest
    {
        $result = PredictionRuleSaveSearchRulesRequest::hydrateBase(new SavePredictionRulesRequest(), $arr);
        return $result;
    }
    function setRules(PredictionRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /** @param PredictionRule[] $rules new value. */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function addToRules(PredictionRule $rules)
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
