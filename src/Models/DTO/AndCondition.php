<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withConditions(UserConditionCollection $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
