<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class HasAuthenticatedIdCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasAuthenticatedIdCondition, Relewise.Client";
    public static function create() : HasAuthenticatedIdCondition
    {
        $result = new HasAuthenticatedIdCondition();
        return $result;
    }
    public static function hydrate(array $arr) : HasAuthenticatedIdCondition
    {
        $result = UserCondition::hydrateBase(new HasAuthenticatedIdCondition(), $arr);
        return $result;
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
