<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class HasPlacedOrderCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasPlacedOrderCondition, Relewise.Client";
    public int $withinMinutes;
    public static function create(bool $negated) : HasPlacedOrderCondition
    {
        $result = new HasPlacedOrderCondition();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : HasPlacedOrderCondition
    {
        $result = UserCondition::hydrateBase(new HasPlacedOrderCondition(), $arr);
        if (array_key_exists("withinMinutes", $arr))
        {
            $result->setinMinutes = $arr["withinMinutes"];
        }
        return $result;
    }
    function setWithinMinutes(int $withinMinutes)
    {
        $this->setinMinutes = $withinMinutes;
        return $this;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
