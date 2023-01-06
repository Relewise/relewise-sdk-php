<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

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
    function withValue(DataValue $value)
    {
        $this->value = $value;
        return $this;
    }
    function withMode(ObjectValueContainsConditionCompareMode $mode)
    {
        $this->mode = $mode;
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