<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class RedirectRulesResponse extends RedirectRuleSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.RedirectRulesResponse, Relewise.Client";
    public static function create(array $rules, int $hits) : RedirectRulesResponse
    {
        $result = new RedirectRulesResponse();
        $result->rules = $rules;
        $result->hits = $hits;
        return $result;
    }
    public static function hydrate(array $arr) : RedirectRulesResponse
    {
        $result = RedirectRuleSearchRulesResponse::hydrateBase(new RedirectRulesResponse(), $arr);
        return $result;
    }
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
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
