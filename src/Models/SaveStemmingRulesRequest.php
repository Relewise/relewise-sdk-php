<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SaveStemmingRulesRequest extends StemmingRuleSaveSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SaveStemmingRulesRequest, Relewise.Client";
    public static function create(string $modifiedBy) : SaveStemmingRulesRequest
    {
        $result = new SaveStemmingRulesRequest();
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    public static function hydrate(array $arr) : SaveStemmingRulesRequest
    {
        $result = StemmingRuleSaveSearchRulesRequest::hydrateBase(new SaveStemmingRulesRequest(), $arr);
        return $result;
    }
    /**
     * Sets rules to a new value.
     * @param StemmingRule[] $rules new value.
     */
    function setRules(StemmingRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /**
     * Sets rules to a new value from an array.
     * @param StemmingRule[] $rules new value.
     */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /**
     * Adds a new element to rules.
     * @param StemmingRule $rules new element.
     */
    function addToRules(StemmingRule $rules)
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
