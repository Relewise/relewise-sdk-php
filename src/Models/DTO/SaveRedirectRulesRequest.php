<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SaveRedirectRulesRequest extends RedirectRuleSaveSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SaveRedirectRulesRequest, Relewise.Client";
    public static function create() : SaveRedirectRulesRequest
    {
        $result = new SaveRedirectRulesRequest();
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
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
