<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ObjectValueInRangeCondition extends ObjectValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueInRangeCondition, Relewise.Client";
    public floatRange $range;
    public static function create(string $key, floatRange $range, bool $negated = false) : ObjectValueInRangeCondition
    {
        $result = new ObjectValueInRangeCondition();
        $result->key = $key;
        $result->range = $range;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ObjectValueInRangeCondition
    {
        $result = ObjectValueCondition::hydrateBase(new ObjectValueInRangeCondition(), $arr);
        if (array_key_exists("range", $arr))
        {
            $result->range = floatRange::hydrate($arr["range"]);
        }
        return $result;
    }
    function setRange(floatRange $range)
    {
        $this->range = $range;
        return $this;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setObjectPath(string ... $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
}
