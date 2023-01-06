<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SaveDecompoundRulesResponse extends DecompoundRuleSaveSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SaveDecompoundRulesResponse, Relewise.Client";
    public static function create() : SaveDecompoundRulesResponse
    {
        $result = new SaveDecompoundRulesResponse();
        return $result;
    }
    public static function hydrate(array $arr) : SaveDecompoundRulesResponse
    {
        $result = DecompoundRuleSaveSearchRulesResponse::hydrateBase(new SaveDecompoundRulesResponse(), $arr);
        return $result;
    }
    function setRules(DecompoundRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function addToRules(DecompoundRule $rules)
    {
        if (!isset($this->rules))
        {
            $this->rules = array();
        }
        array_push($this->rules, $rules);
        return $this;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
