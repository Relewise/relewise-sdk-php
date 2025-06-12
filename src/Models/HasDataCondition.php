<?php declare(strict_types=1);

namespace Relewise\Models;

/** a UserCondition that checks whether the User's data-bag has a Key whose value satisfies the provided Conditions. */
class HasDataCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasDataCondition, Relewise.Client";
    /** The key that must be found in the User's data-bag for the UserCondition to be satisfied. */
    public string $key;
    /** The conditions that must be satisfied for the DataValue found at the Key in the User's data-bag. */
    public ?ValueConditionCollection $conditions;
    
    public static function create(string $key, ?ValueConditionCollection $conditions = Null, bool $negated = false) : HasDataCondition
    {
        $result = new HasDataCondition();
        $result->key = $key;
        $result->conditions = $conditions;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : HasDataCondition
    {
        $result = UserCondition::hydrateBase(new HasDataCondition(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("conditions", $arr))
        {
            $result->conditions = ValueConditionCollection::hydrate($arr["conditions"]);
        }
        return $result;
    }
    
    /** The key that must be found in the User's data-bag for the UserCondition to be satisfied. */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    /** The conditions that must be satisfied for the DataValue found at the Key in the User's data-bag. */
    function setConditions(?ValueConditionCollection $conditions)
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
