<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SaveStemmingRulesResponse extends StemmingRuleSaveSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SaveStemmingRulesResponse, Relewise.Client";
    public static function create() : SaveStemmingRulesResponse
    {
        $result = new SaveStemmingRulesResponse();
        return $result;
    }
    public static function hydrate(array $arr) : SaveStemmingRulesResponse
    {
        $result = StemmingRuleSaveSearchRulesResponse::hydrateBase(new SaveStemmingRulesResponse(), $arr);
        return $result;
    }
    function withRules(StemmingRule ... $rules)
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
