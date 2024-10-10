<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class ObjectValueCondition
{
    public string $typeDefinition = "";
    /** Whether the condition should be negated / inverted */
    public bool $negated;
    
    /** The key of the object that the condition will compare against. */
    public string $key;
    
    /** An optional path to some nested object defined under the selected Key. */
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
        if ($type=="Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueIsSubsetOfCondition, Relewise.Client")
        {
            return ObjectValueIsSubsetOfCondition::hydrate($arr);
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
        if ($type=="Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueRelativeDateTimeCondition, Relewise.Client")
        {
            return ObjectValueRelativeDateTimeCondition::hydrate($arr);
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
    
    /** Whether the condition should be negated / inverted */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    
    /** The key of the object that the condition will compare against. */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    /** An optional path to some nested object defined under the selected Key. */
    function setObjectPath(string ... $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
    
    /**
     * An optional path to some nested object defined under the selected Key.
     * @param ?string[] $objectPath new value.
     */
    function setObjectPathFromArray(array $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
    
    /** An optional path to some nested object defined under the selected Key. */
    function addToObjectPath(string $objectPath)
    {
        if (!isset($this->objectPath))
        {
            $this->objectPath = array();
        }
        array_push($this->objectPath, $objectPath);
        return $this;
    }
}
