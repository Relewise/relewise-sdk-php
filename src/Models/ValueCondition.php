<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class ValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Conditions.ValueCondition, Relewise.Client";
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
        if ($type=="Relewise.Client.Requests.Conditions.LessThanCondition, Relewise.Client")
        {
            return LessThanCondition::hydrate($arr);
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
    /**
     * Sets negated to a new value.
     * @param bool $negated new value.
     */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
