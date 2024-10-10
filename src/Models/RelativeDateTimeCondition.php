<?php declare(strict_types=1);

namespace Relewise\Models;

/** a ValueCondition that can check if an object value interpreted as a timestamp is before or after the current time. */
class RelativeDateTimeCondition extends ValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Conditions.RelativeDateTimeCondition, Relewise.Client";
    
    /** Defines whether the compared value should be before or after the current time for the condition to evaluate true. */
    public RelativeTimeComparison $comparison;
    /** Defines the time unit that the compared value is defined in. */
    public TimeUnit $unit;
    /** Defines an offset that is added to the current time when making the specified Comparison. This is specified in the unit defined by the Unit property. */
    public int $currentTimeOffset;
    public static function create(RelativeTimeComparison $comparison, TimeUnit $unit, int $currentTimeOffset = 0, bool $negated = false) : RelativeDateTimeCondition
    {
        $result = new RelativeDateTimeCondition();
        $result->comparison = $comparison;
        $result->unit = $unit;
        $result->currentTimeOffset = $currentTimeOffset;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : RelativeDateTimeCondition
    {
        $result = ValueCondition::hydrateBase(new RelativeDateTimeCondition(), $arr);
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
}
