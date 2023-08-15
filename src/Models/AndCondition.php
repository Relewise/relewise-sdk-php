<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class AndCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.AndCondition, Relewise.Client";
    public UserConditionCollection $conditions;
    public static function create(UserConditionCollection $conditions, bool $negated) : AndCondition
    {
        $result = new AndCondition();
        $result->conditions = $conditions;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : AndCondition
    {
        $result = UserCondition::hydrateBase(new AndCondition(), $arr);
        if (array_key_exists("conditions", $arr))
        {
            $result->conditions = UserConditionCollection::hydrate($arr["conditions"]);
        }
        return $result;
    }
    /**
     * Sets conditions to a new value.
     * @param UserConditionCollection $conditions new value.
     */
    function setConditions(UserConditionCollection $conditions)
    {
        $this->conditions = $conditions;
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
