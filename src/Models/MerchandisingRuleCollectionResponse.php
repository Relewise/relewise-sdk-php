<?php declare(strict_types=1);

namespace Relewise\Models;

class MerchandisingRuleCollectionResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Merchandising.MerchandisingRuleCollectionResponse, Relewise.Client";
    
    public array $rules;
    public static function create() : MerchandisingRuleCollectionResponse
    {
        $result = new MerchandisingRuleCollectionResponse();
        return $result;
    }
    
    public static function hydrate(array $arr) : MerchandisingRuleCollectionResponse
    {
        $result = TimedResponse::hydrateBase(new MerchandisingRuleCollectionResponse(), $arr);
        if (array_key_exists("rules", $arr))
        {
            $result->rules = array();
            foreach($arr["rules"] as &$value)
            {
                array_push($result->rules, MerchandisingRule::hydrate($value));
            }
        }
        return $result;
    }
    
    function setRules(MerchandisingRule ... $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    
    /** @param MerchandisingRule[] $rules new value. */
    function setRulesFromArray(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }
    
    function addToRules(MerchandisingRule $rules)
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
