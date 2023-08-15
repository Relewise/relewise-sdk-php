<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class HasRecentlyReceivedSameTriggerCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasRecentlyReceivedSameTriggerCondition, Relewise.Client";
    public int $withinMinutes;
    public static function create(bool $negated) : HasRecentlyReceivedSameTriggerCondition
    {
        $result = new HasRecentlyReceivedSameTriggerCondition();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : HasRecentlyReceivedSameTriggerCondition
    {
        $result = UserCondition::hydrateBase(new HasRecentlyReceivedSameTriggerCondition(), $arr);
        if (array_key_exists("withinMinutes", $arr))
        {
            $result->withinMinutes = $arr["withinMinutes"];
        }
        return $result;
    }
    /**
     * Sets withinMinutes to a new value.
     * @param int $withinMinutes new value.
     */
    function setWithinMinutes(int $withinMinutes)
    {
        $this->withinMinutes = $withinMinutes;
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
}
