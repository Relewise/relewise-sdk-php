<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class LessThanCondition extends ValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Conditions.LessThanCondition, Relewise.Client";
    public float $value;
    public static function create(float $value, bool $negated = false) : LessThanCondition
    {
        $result = new LessThanCondition();
        $result->value = $value;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : LessThanCondition
    {
        $result = ValueCondition::hydrateBase(new LessThanCondition(), $arr);
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
