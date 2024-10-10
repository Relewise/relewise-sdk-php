<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class SearchTermModifierRuleSaveSearchRulesResponse extends TimedResponse
{
    public string $typeDefinition = "";
    
    public array $rules;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Search.Rules.SaveSearchTermModifierRulesResponse, Relewise.Client")
        {
            return SaveSearchTermModifierRulesResponse::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = TimedResponse::hydrateBase($result, $arr);
        if (array_key_exists("rules", $arr))
        {
            $result->rules = array();
            foreach($arr["rules"] as &$value)
            {
                array_push($result->rules, SearchTermModifierRule::hydrate($value));
            }
        }
        return $result;
    }
    
    function setRules(SearchTermModifierRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    
    /** @param SearchTermModifierRule[] $rules new value. */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    
    function addToRules(SearchTermModifierRule $rules)
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
