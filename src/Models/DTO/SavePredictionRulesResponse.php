<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SavePredictionRulesResponse extends PredictionRuleSaveSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SavePredictionRulesResponse, Relewise.Client";
    public static function create() : SavePredictionRulesResponse
    {
        $result = new SavePredictionRulesResponse();
        return $result;
    }
    public static function hydrate(array $arr) : SavePredictionRulesResponse
    {
        $result = PredictionRuleSaveSearchRulesResponse::hydrateBase(new SavePredictionRulesResponse(), $arr);
        return $result;
    }
    function withRules(PredictionRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
