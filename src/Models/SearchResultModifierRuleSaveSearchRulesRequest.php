<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class SearchResultModifierRuleSaveSearchRulesRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.SaveSearchRulesRequest`1[[Relewise.Client.DataTypes.Search.Rules.SearchResultModifierRule, Relewise.Client, Version=1.96.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public array $rules;
    public string $modifiedBy;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Search.Rules.SaveSearchResultModifierRulesRequest, Relewise.Client")
        {
            return SaveSearchResultModifierRulesRequest::hydrate($arr);
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
                array_push($result->rules, SearchResultModifierRule::hydrate($value));
            }
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        return $result;
    }
    function setRules(SearchResultModifierRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    function addToRules(SearchResultModifierRule $rules)
    {
        if (!isset($this->rules))
        {
            $this->rules = array();
        }
        array_push($this->rules, $rules);
        return $this;
    }
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
