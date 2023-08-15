<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets value to a new value.
     * @param DataValue $value new value.
     */
    function setValue(DataValue $value)
    {
        $this->value = $value;
        return $this;
    }
    /**
     * Sets mode to a new value.
     * @param ObjectValueContainsConditionCompareMode $mode new value.
     */
    function setMode(ObjectValueContainsConditionCompareMode $mode)
    {
        $this->mode = $mode;
        return $this;
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
    /**
     * Sets key to a new value.
     * @param string $key new value.
     */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    /**
     * Sets objectPath to a new value.
     * @param ?string[] $objectPath new value.
     */
    function setObjectPath(string ... $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
    /**
     * Sets objectPath to a new value from an array.
     * @param ?string[] $objectPath new value.
     */
    function setObjectPathFromArray(array $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
    /**
     * Adds a new element to objectPath.
     * @param string $objectPath new element.
     */
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
