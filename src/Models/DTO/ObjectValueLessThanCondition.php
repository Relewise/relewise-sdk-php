<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ObjectValueLessThanCondition extends ObjectValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueLessThanCondition, Relewise.Client";
    public float $value;
    public static function create(string $key, float $value, bool $negated = false) : ObjectValueLessThanCondition
    {
        $result = new ObjectValueLessThanCondition();
        $result->key = $key;
        $result->value = $value;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ObjectValueLessThanCondition
    {
        $result = ObjectValueCondition::hydrateBase(new ObjectValueLessThanCondition(), $arr);
        if (array_key_exists("value", $arr))
        {
            $result->value = $arr["value"];
        }
        return $result;
    }
    function withValue(float $value)
    {
        $this->value = $value;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function withKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function withObjectPath(string ... $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
}
