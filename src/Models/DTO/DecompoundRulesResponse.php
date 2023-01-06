<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DecompoundRulesResponse extends DecompoundRuleSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.DecompoundRulesResponse, Relewise.Client";
    public static function create() : DecompoundRulesResponse
    {
        $result = new DecompoundRulesResponse();
        return $result;
    }
    public static function hydrate(array $arr) : DecompoundRulesResponse
    {
        $result = DecompoundRuleSearchRulesResponse::hydrateBase(new DecompoundRulesResponse(), $arr);
        return $result;
    }
    function withRules(DecompoundRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function withHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
