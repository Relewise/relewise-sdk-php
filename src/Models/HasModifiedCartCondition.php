<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class HasModifiedCartCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasModifiedCartCondition, Relewise.Client";
    public int $withinMinutes;
    public string $cartName;
    public static function create(string $cartName = Null, bool $negated = false) : HasModifiedCartCondition
    {
        $result = new HasModifiedCartCondition();
        $result->cartName = $cartName;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : HasModifiedCartCondition
    {
        $result = UserCondition::hydrateBase(new HasModifiedCartCondition(), $arr);
        if (array_key_exists("withinMinutes", $arr))
        {
            $result->withinMinutes = $arr["withinMinutes"];
        }
        if (array_key_exists("cartName", $arr))
        {
            $result->cartName = $arr["cartName"];
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
     * Sets cartName to a new value.
     * @param string $cartName new value.
     */
    function setCartName(string $cartName)
    {
        $this->cartName = $cartName;
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
