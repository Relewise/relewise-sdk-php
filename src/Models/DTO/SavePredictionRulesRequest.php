<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SavePredictionRulesRequest extends PredictionRuleSaveSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SavePredictionRulesRequest, Relewise.Client";
    public static function create() : SavePredictionRulesRequest
    {
        $result = new SavePredictionRulesRequest();
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
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
