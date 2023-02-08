<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class RedirectRuleSaveSearchRulesResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SaveSearchRulesResponse`1[[Relewise.Client.DataTypes.Search.Configuration.SearchRules.RedirectRule, Relewise.Client, Version=1.61.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public array $rules;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Search.Rules.SaveRedirectRulesResponse, Relewise.Client")
        {
            return SaveRedirectRulesResponse::hydrate($arr);
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
                array_push($result->rules, RedirectRule::hydrate($value));
            }
        }
        return $result;
    }
    function setRules(RedirectRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function setRulesFromArray(array $rules)
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
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
