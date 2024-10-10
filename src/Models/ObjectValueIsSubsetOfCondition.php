<?php declare(strict_types=1);

namespace Relewise\Models;

class ObjectValueIsSubsetOfCondition extends ObjectValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueIsSubsetOfCondition, Relewise.Client";
    
    public DataValue $value;
    public static function create(string $key, DataValue $value, bool $negated = false) : ObjectValueIsSubsetOfCondition
    {
        $result = new ObjectValueIsSubsetOfCondition();
        $result->key = $key;
        $result->value = $value;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ObjectValueIsSubsetOfCondition
    {
        $result = ObjectValueCondition::hydrateBase(new ObjectValueIsSubsetOfCondition(), $arr);
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
    
    /** @param ?string[] $objectPath new value. */
    function setObjectPathFromArray(array $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
    
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
