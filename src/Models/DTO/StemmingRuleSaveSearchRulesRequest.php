<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class StemmingRuleSaveSearchRulesRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SaveSearchRulesRequest`1[[Relewise.Client.DataTypes.Search.Configuration.SearchRules.StemmingRule, Relewise.Client, Version=1.56.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public array $rules;
    public string $modifiedBy;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Search.Rules.SaveStemmingRulesRequest, Relewise.Client")
        {
            return SaveStemmingRulesRequest::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = LicensedRequest::hydrateBase($result, $arr);
        if (array_key_exists("rules", $arr))
        {
            $result->rules = array();
            foreach($arr["rules"] as &$value)
            {
                array_push($result->rules, StemmingRule::hydrate($value));
            }
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        return $result;
    }
    function withRules(StemmingRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function withModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
