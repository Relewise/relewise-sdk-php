<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class DecompoundRuleSaveSearchRulesRequest extends LicensedRequest
{
    public string $typeDefinition = "";
    public array $rules;
    public string $modifiedBy;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Search.Rules.SaveDecompoundRulesRequest, Relewise.Client")
        {
            return SaveDecompoundRulesRequest::hydrate($arr);
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
                array_push($result->rules, DecompoundRule::hydrate($value));
            }
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        return $result;
    }
    
    function setRules(DecompoundRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    
    /** @param DecompoundRule[] $rules new value. */
    function setRulesFromArray(array $rules)
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
    
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
