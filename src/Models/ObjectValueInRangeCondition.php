<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets range to a new value.
     * @param floatRange $range new value.
     */
    function setRange(floatRange $range)
    {
        $this->range = $range;
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
