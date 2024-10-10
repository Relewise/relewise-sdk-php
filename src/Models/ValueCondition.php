<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class ValueCondition
{
    public string $typeDefinition = "";
    
    /** Whether the condition should be negated / inverted */
    public bool $negated;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Conditions.ContainsCondition, Relewise.Client")
        {
            return ContainsCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Conditions.DistinctCondition, Relewise.Client")
        {
            return DistinctCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Conditions.EqualsCondition, Relewise.Client")
        {
            return EqualsCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Conditions.GreaterThanCondition, Relewise.Client")
        {
            return GreaterThanCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Conditions.HasValueCondition, Relewise.Client")
        {
            return HasValueCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Conditions.LessThanCondition, Relewise.Client")
        {
            return LessThanCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Conditions.RelativeDateTimeCondition, Relewise.Client")
        {
            return RelativeDateTimeCondition::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("negated", $arr))
        {
            $result->negated = $arr["negated"];
        }
        return $result;
    }
    
    /** Whether the condition should be negated / inverted */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
