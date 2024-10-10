<?php declare(strict_types=1);

namespace Relewise\Models;

class OrCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.OrCondition, Relewise.Client";
    public UserConditionCollection $conditions;
    public static function create(UserConditionCollection $conditions, bool $negated) : OrCondition
    {
        $result = new OrCondition();
        $result->conditions = $conditions;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : OrCondition
    {
        $result = UserCondition::hydrateBase(new OrCondition(), $arr);
        if (array_key_exists("conditions", $arr))
        {
            $result->conditions = UserConditionCollection::hydrate($arr["conditions"]);
        }
        return $result;
    }
    
    function setConditions(UserConditionCollection $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
