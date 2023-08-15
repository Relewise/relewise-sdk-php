<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SaveRedirectRulesResponse extends RedirectRuleSaveSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SaveRedirectRulesResponse, Relewise.Client";
    public static function create(RedirectRule ... $rules) : SaveRedirectRulesResponse
    {
        $result = new SaveRedirectRulesResponse();
        $result->rules = $rules;
        return $result;
    }
    public static function hydrate(array $arr) : SaveRedirectRulesResponse
    {
        $result = RedirectRuleSaveSearchRulesResponse::hydrateBase(new SaveRedirectRulesResponse(), $arr);
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
     * Sets statistics to a new value.
     * @param Statistics $statistics new value.
     */
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
