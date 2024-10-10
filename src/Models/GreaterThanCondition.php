<?php declare(strict_types=1);

namespace Relewise\Models;

class GreaterThanCondition extends ValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Conditions.GreaterThanCondition, Relewise.Client";
    public float $value;
    public static function create(float $value, bool $negated = false) : GreaterThanCondition
    {
        $result = new GreaterThanCondition();
        $result->value = $value;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : GreaterThanCondition
    {
        $result = ValueCondition::hydrateBase(new GreaterThanCondition(), $arr);
        if (array_key_exists("value", $arr))
        {
            $result->value = $arr["value"];
        }
        return $result;
    }
    
    function setValue(float $value)
    {
        $this->value = $value;
        return $this;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
