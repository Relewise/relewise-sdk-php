<?php declare(strict_types=1);

namespace Relewise\Models;

class HasValueCondition extends ValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Conditions.HasValueCondition, Relewise.Client";
    
    public static function create(bool $negated = false) : HasValueCondition
    {
        $result = new HasValueCondition();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : HasValueCondition
    {
        $result = ValueCondition::hydrateBase(new HasValueCondition(), $arr);
        return $result;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
