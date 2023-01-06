<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SaveRedirectRulesResponse extends RedirectRuleSaveSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SaveRedirectRulesResponse, Relewise.Client";
    public static function create() : SaveRedirectRulesResponse
    {
        $result = new SaveRedirectRulesResponse();
        return $result;
    }
    public static function hydrate(array $arr) : SaveRedirectRulesResponse
    {
        $result = RedirectRuleSaveSearchRulesResponse::hydrateBase(new SaveRedirectRulesResponse(), $arr);
        return $result;
    }
    function setRules(RedirectRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
