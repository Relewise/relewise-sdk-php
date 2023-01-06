<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SaveDecompoundRulesRequest extends DecompoundRuleSaveSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SaveDecompoundRulesRequest, Relewise.Client";
    public static function create() : SaveDecompoundRulesRequest
    {
        $result = new SaveDecompoundRulesRequest();
        return $result;
    }
    public static function hydrate(array $arr) : SaveDecompoundRulesRequest
    {
        $result = DecompoundRuleSaveSearchRulesRequest::hydrateBase(new SaveDecompoundRulesRequest(), $arr);
        return $result;
    }
    function withRules(DecompoundRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function withModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
