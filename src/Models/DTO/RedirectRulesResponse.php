<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class RedirectRulesResponse extends RedirectRuleSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.RedirectRulesResponse, Relewise.Client";
    public static function create() : RedirectRulesResponse
    {
        $result = new RedirectRulesResponse();
        return $result;
    }
    public static function hydrate(array $arr) : RedirectRulesResponse
    {
        $result = RedirectRuleSearchRulesResponse::hydrateBase(new RedirectRulesResponse(), $arr);
        return $result;
    }
    function withRules(RedirectRule ... $rules)
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