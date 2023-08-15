<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class HasRecentlyReceivedTriggerCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasRecentlyReceivedTriggerCondition, Relewise.Client";
    public int $withinMinutes;
    public ?string $id;
    public string $group;
    public ?int $type;
    public static function create(?string $id, string $group, bool $negated) : HasRecentlyReceivedTriggerCondition
    {
        $result = new HasRecentlyReceivedTriggerCondition();
        $result->id = $id;
        $result->group = $group;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : HasRecentlyReceivedTriggerCondition
    {
        $result = UserCondition::hydrateBase(new HasRecentlyReceivedTriggerCondition(), $arr);
        if (array_key_exists("withinMinutes", $arr))
        {
            $result->withinMinutes = $arr["withinMinutes"];
        }
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("group", $arr))
        {
            $result->group = $arr["group"];
        }
        if (array_key_exists("type", $arr))
        {
            $result->type = $arr["type"];
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
     * Sets id to a new value.
     * @param ?string $id new value.
     */
    function setId(?string $id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Sets group to a new value.
     * @param string $group new value.
     */
    function setGroup(string $group)
    {
        $this->group = $group;
        return $this;
    }
    /**
     * Sets type to a new value.
     * @param ?int $type new value.
     */
    function setType(?int $type)
    {
        $this->type = $type;
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
