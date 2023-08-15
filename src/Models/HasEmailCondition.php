<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class HasEmailCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasEmailCondition, Relewise.Client";
    public static function create(bool $negated) : HasEmailCondition
    {
        $result = new HasEmailCondition();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : HasEmailCondition
    {
        $result = UserCondition::hydrateBase(new HasEmailCondition(), $arr);
        return $result;
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
