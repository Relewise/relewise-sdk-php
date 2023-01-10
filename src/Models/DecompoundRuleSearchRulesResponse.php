<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class DecompoundRuleSearchRulesResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SearchRulesResponse`1[[Relewise.Client.DataTypes.Search.Configuration.SearchRules.DecompoundRule, Relewise.Client, Version=1.56.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public array $rules;
    public int $hits;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Search.Rules.DecompoundRulesResponse, Relewise.Client")
        {
            return DecompoundRulesResponse::hydrate($arr);
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
                array_push($result->rules, DecompoundRule::hydrate($value));
            }
        }
        if (array_key_exists("hits", $arr))
        {
            $result->hits = $arr["hits"];
        }
        return $result;
    }
    function setRules(DecompoundRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function addToRules(DecompoundRule $rules)
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
