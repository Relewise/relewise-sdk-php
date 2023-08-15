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
    /**
     * Sets rules to a new value.
     * @param RedirectRule[] $rules new value.
     */
    function setRules(RedirectRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /**
     * Sets rules to a new value from an array.
     * @param RedirectRule[] $rules new value.
     */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /**
     * Adds a new element to rules.
     * @param RedirectRule $rules new element.
     */
    function addToRules(RedirectRule $rules)
    {
        if (!isset($this->rules))
        {
            $this->rules = array();
        }
        array_push($this->rules, $rules);
        return $this;
    }
    /**
     * Sets modifiedBy to a new value.
     * @param string $modifiedBy new value.
     */
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
