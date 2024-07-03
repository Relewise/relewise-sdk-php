<?php declare(strict_types=1);

namespace Relewise\Models;

class MerchandisingRuleResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Merchandising.MerchandisingRuleResponse, Relewise.Client";
    public MerchandisingRule $rule;
    public static function create() : MerchandisingRuleResponse
    {
        $result = new MerchandisingRuleResponse();
        return $result;
    }
    public static function hydrate(array $arr) : MerchandisingRuleResponse
    {
        $result = TimedResponse::hydrateBase(new MerchandisingRuleResponse(), $arr);
        if (array_key_exists("rule", $arr))
        {
            $result->rule = MerchandisingRule::hydrate($arr["rule"]);
        }
        return $result;
    }
    function setRule(MerchandisingRule $rule)
    {
        $this->rule = $rule;
        return $this;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
