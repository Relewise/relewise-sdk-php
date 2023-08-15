<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets rule to a new value.
     * @param MerchandisingRule $rule new value.
     */
    function setRule(MerchandisingRule $rule)
    {
        $this->rule = $rule;
        return $this;
    }
    /**
     * Sets modifiedBy to a new value.
     * @param string $modifiedBy new value.
     */
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
