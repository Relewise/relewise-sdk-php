<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class SearchTermModifierRuleSearchRulesResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SearchRulesResponse`1[[Relewise.Client.DataTypes.Search.Rules.SearchTermModifierRule, Relewise.Client, Version=1.96.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public array $rules;
    public int $hits;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Search.Rules.SearchTermModifierRulesResponse, Relewise.Client")
        {
            return SearchTermModifierRulesResponse::hydrate($arr);
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
        if (array_key_exists("hits", $arr))
        {
            $result->hits = $arr["hits"];
        }
        return $result;
    }
    function setRules(SearchTermModifierRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
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
