<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveMerchandisingRuleRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Merchandising.SaveMerchandisingRuleRequest, Relewise.Client";
    public MerchandisingRule $rule;
    
    public string $modifiedBy;
    
    public static function create(MerchandisingRule $rule, string $modifiedBy) : SaveMerchandisingRuleRequest
    {
        $result = new SaveMerchandisingRuleRequest();
        $result->rule = $rule;
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveMerchandisingRuleRequest
    {
        $result = LicensedRequest::hydrateBase(new SaveMerchandisingRuleRequest(), $arr);
        if (array_key_exists("rule", $arr))
        {
            $result->rule = MerchandisingRule::hydrate($arr["rule"]);
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        return $result;
    }
    
    function setRule(MerchandisingRule $rule)
    {
        $this->rule = $rule;
        return $this;
    }
    
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
