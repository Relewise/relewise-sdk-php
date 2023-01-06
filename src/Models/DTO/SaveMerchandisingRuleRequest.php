<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

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
    function withRule(MerchandisingRule $rule)
    {
        $this->rule = $rule;
        return $this;
    }
    function withModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
