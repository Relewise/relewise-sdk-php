<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SaveStemmingRulesRequest extends StemmingRuleSaveSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SaveStemmingRulesRequest, Relewise.Client";
    public static function create() : SaveStemmingRulesRequest
    {
        $result = new SaveStemmingRulesRequest();
        return $result;
    }
    public static function hydrate(array $arr) : SaveStemmingRulesRequest
    {
        $result = StemmingRuleSaveSearchRulesRequest::hydrateBase(new SaveStemmingRulesRequest(), $arr);
        return $result;
    }
    function withRules(StemmingRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function withModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
