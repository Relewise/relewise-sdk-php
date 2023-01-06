<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class StemmingRuleSaveSearchRulesResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.Rules.SaveSearchRulesResponse`1[[Relewise.Client.DataTypes.Search.Configuration.SearchRules.StemmingRule, Relewise.Client, Version=1.56.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public array $rules;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Search.Rules.SaveStemmingRulesResponse, Relewise.Client")
        {
            return SaveStemmingRulesResponse::hydrate($arr);
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
                array_push($result->rules, StemmingRule::hydrate($value));
            }
        }
        return $result;
    }
    function withRules(StemmingRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}