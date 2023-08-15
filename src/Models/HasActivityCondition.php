<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class HasActivityCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasActivityCondition, Relewise.Client";
    public int $withinMinutes;
    public int $forAtLeastSeconds;
    public static function create(bool $negated) : HasActivityCondition
    {
        $result = new HasActivityCondition();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : HasActivityCondition
    {
        $result = UserCondition::hydrateBase(new HasActivityCondition(), $arr);
        if (array_key_exists("withinMinutes", $arr))
        {
            $result->withinMinutes = $arr["withinMinutes"];
        }
        if (array_key_exists("forAtLeastSeconds", $arr))
        {
            $result->forAtLeastSeconds = $arr["forAtLeastSeconds"];
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
     * Sets forAtLeastSeconds to a new value.
     * @param int $forAtLeastSeconds new value.
     */
    function setForAtLeastSeconds(int $forAtLeastSeconds)
    {
        $this->forAtLeastSeconds = $forAtLeastSeconds;
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
