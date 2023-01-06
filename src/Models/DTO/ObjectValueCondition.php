<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class ObjectValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueCondition, Relewise.Client";
    public bool $negated;
    public string $key;
    public ?array $objectPath;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueContainsCondition, Relewise.Client")
        {
            return ObjectValueContainsCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueEqualsCondition, Relewise.Client")
        {
            return ObjectValueEqualsCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueGreaterThanCondition, Relewise.Client")
        {
            return ObjectValueGreaterThanCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueInRangeCondition, Relewise.Client")
        {
            return ObjectValueInRangeCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueLessThanCondition, Relewise.Client")
        {
            return ObjectValueLessThanCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueMaxByCondition, Relewise.Client")
        {
            return ObjectValueMaxByCondition::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueMinByCondition, Relewise.Client")
        {
            return ObjectValueMinByCondition::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("negated", $arr))
        {
            $result->negated = $arr["negated"];
        }
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("objectPath", $arr))
        {
            $result->objectPath = array();
            foreach($arr["objectPath"] as &$value)
            {
                array_push($result->objectPath, $value);
            }
        }
        return $result;
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
