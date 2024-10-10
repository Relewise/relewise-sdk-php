<?php declare(strict_types=1);

namespace Relewise\Models;

class HasAuthenticatedIdCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasAuthenticatedIdCondition, Relewise.Client";
    public static function create(bool $negated) : HasAuthenticatedIdCondition
    {
        $result = new HasAuthenticatedIdCondition();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : HasAuthenticatedIdCondition
    {
        $result = UserCondition::hydrateBase(new HasAuthenticatedIdCondition(), $arr);
        return $result;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
