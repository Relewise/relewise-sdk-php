<?php declare(strict_types=1);

namespace Relewise\Models;

/** a ObjectValueCondition that can check if an object value interpreted as a timestamp is before or after the current time. */
class ObjectValueRelativeDateTimeCondition extends ObjectValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DataObjects.Conditions.ObjectValueRelativeDateTimeCondition, Relewise.Client";
    /** Defines whether the compared value should be before or after the current time for the condition to evaluate true. */
    public RelativeTimeComparison $comparison;
    /** Defines the time unit that the compared value is defined in. */
    public TimeUnit $unit;
    /** Defines an offset that is added to the current time when making the specified Comparison. This is specified in the unit defined by the Unit property. */
    public int $currentTimeOffset;
    public static function create(string $key, RelativeTimeComparison $comparison, TimeUnit $unit, int $currentTimeOffset = 0, bool $negated = false) : ObjectValueRelativeDateTimeCondition
    {
        $result = new ObjectValueRelativeDateTimeCondition();
        $result->key = $key;
        $result->comparison = $comparison;
        $result->unit = $unit;
        $result->currentTimeOffset = $currentTimeOffset;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ObjectValueRelativeDateTimeCondition
    {
        $result = ObjectValueCondition::hydrateBase(new ObjectValueRelativeDateTimeCondition(), $arr);
        if (array_key_exists("comparison", $arr))
        {
            $result->comparison = RelativeTimeComparison::from($arr["comparison"]);
        }
        if (array_key_exists("unit", $arr))
        {
            $result->unit = TimeUnit::from($arr["unit"]);
        }
        if (array_key_exists("currentTimeOffset", $arr))
        {
            $result->currentTimeOffset = $arr["currentTimeOffset"];
        }
        return $result;
    }
    
    /** Defines whether the compared value should be before or after the current time for the condition to evaluate true. */
    function setComparison(RelativeTimeComparison $comparison)
    {
        $this->comparison = $comparison;
        return $this;
    }
    
    /** Defines the time unit that the compared value is defined in. */
    function setUnit(TimeUnit $unit)
    {
        $this->unit = $unit;
        return $this;
    }
    
    /** Defines an offset that is added to the current time when making the specified Comparison. This is specified in the unit defined by the Unit property. */
    function setCurrentTimeOffset(int $currentTimeOffset)
    {
        $this->currentTimeOffset = $currentTimeOffset;
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
