<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class HasEmailCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasEmailCondition, Relewise.Client";
    public static function create() : HasEmailCondition
    {
        $result = new HasEmailCondition();
        return $result;
    }
    public static function hydrate(array $arr) : HasEmailCondition
    {
        $result = UserCondition::hydrateBase(new HasEmailCondition(), $arr);
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
