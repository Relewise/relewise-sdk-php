<?php declare(strict_types=1);

namespace Relewise\Models;

class EqualsCondition extends ValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Conditions.EqualsCondition, Relewise.Client";
    public DataValue $value;
    
    public static function create(DataValue $value, bool $negated = false) : EqualsCondition
    {
        $result = new EqualsCondition();
        $result->value = $value;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : EqualsCondition
    {
        $result = ValueCondition::hydrateBase(new EqualsCondition(), $arr);
        if (array_key_exists("value", $arr))
        {
            $result->value = DataValue::hydrate($arr["value"]);
        }
        return $result;
    }
    
    function setValue(DataValue $value)
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
