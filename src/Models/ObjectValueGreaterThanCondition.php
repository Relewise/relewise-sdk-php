<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ObjectValueGreaterThanCondition extends ObjectValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueGreaterThanCondition, Relewise.Client";
    public float $value;
    public static function create(string $key, float $value, bool $negated = false) : ObjectValueGreaterThanCondition
    {
        $result = new ObjectValueGreaterThanCondition();
        $result->key = $key;
        $result->value = $value;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ObjectValueGreaterThanCondition
    {
        $result = ObjectValueCondition::hydrateBase(new ObjectValueGreaterThanCondition(), $arr);
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
