<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SaveRedirectRulesRequest extends RedirectRuleSaveSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SaveRedirectRulesRequest, Relewise.Client";
    public static function create(string $modifiedBy) : SaveRedirectRulesRequest
    {
        $result = new SaveRedirectRulesRequest();
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    public static function hydrate(array $arr) : SaveRedirectRulesRequest
    {
        $result = RedirectRuleSaveSearchRulesRequest::hydrateBase(new SaveRedirectRulesRequest(), $arr);
        return $result;
    }
    function setRules(RedirectRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function addToRules(RedirectRule $rules)
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
