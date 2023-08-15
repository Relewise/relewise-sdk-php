<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SaveDecompoundRulesResponse extends DecompoundRuleSaveSearchRulesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SaveDecompoundRulesResponse, Relewise.Client";
    public static function create(DecompoundRule ... $rules) : SaveDecompoundRulesResponse
    {
        $result = new SaveDecompoundRulesResponse();
        $result->rules = $rules;
        return $result;
    }
    public static function hydrate(array $arr) : SaveDecompoundRulesResponse
    {
        $result = DecompoundRuleSaveSearchRulesResponse::hydrateBase(new SaveDecompoundRulesResponse(), $arr);
        return $result;
    }
    /**
     * Sets rules to a new value.
     * @param DecompoundRule[] $rules new value.
     */
    function setRules(DecompoundRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /**
     * Sets rules to a new value from an array.
     * @param DecompoundRule[] $rules new value.
     */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    /**
     * Adds a new element to rules.
     * @param DecompoundRule $rules new element.
     */
    function addToRules(DecompoundRule $rules)
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
