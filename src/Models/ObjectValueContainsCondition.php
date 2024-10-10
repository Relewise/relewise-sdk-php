<?php declare(strict_types=1);

namespace Relewise\Models;

class ObjectValueContainsCondition extends ObjectValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueContainsCondition, Relewise.Client";
    public DataValue $value;
    
    public ObjectValueContainsConditionCompareMode $mode;
    
    public static function create(string $key, DataValue $value, ObjectValueContainsConditionCompareMode $mode = ObjectValueContainsConditionCompareMode::All, bool $negated = false) : ObjectValueContainsCondition
    {
        $result = new ObjectValueContainsCondition();
        $result->key = $key;
        $result->value = $value;
        $result->mode = $mode;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ObjectValueContainsCondition
    {
        $result = ObjectValueCondition::hydrateBase(new ObjectValueContainsCondition(), $arr);
        if (array_key_exists("value", $arr))
        {
            $result->value = DataValue::hydrate($arr["value"]);
        }
        if (array_key_exists("mode", $arr))
        {
            $result->mode = ObjectValueContainsConditionCompareMode::from($arr["mode"]);
        }
        return $result;
    }
    
    function setValue(DataValue $value)
    {
        $this->value = $value;
        return $this;
    }
    
    function setMode(ObjectValueContainsConditionCompareMode $mode)
    {
        $this->mode = $mode;
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
