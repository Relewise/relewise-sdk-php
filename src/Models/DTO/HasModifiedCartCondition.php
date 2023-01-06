<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class HasModifiedCartCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasModifiedCartCondition, Relewise.Client";
    public int $withinMinutes;
    public string $cartName;
    public static function create(string $cartName = Null, bool $negated = false) : HasModifiedCartCondition
    {
        $result = new HasModifiedCartCondition();
        $result->cartName = $cartName;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : HasModifiedCartCondition
    {
        $result = UserCondition::hydrateBase(new HasModifiedCartCondition(), $arr);
        if (array_key_exists("withinMinutes", $arr))
        {
            $result->withinMinutes = $arr["withinMinutes"];
        }
        if (array_key_exists("cartName", $arr))
        {
            $result->cartName = $arr["cartName"];
        }
        return $result;
    }
    function withWithinMinutes(int $withinMinutes)
    {
        $this->withinMinutes = $withinMinutes;
        return $this;
    }
    function withCartName(string $cartName)
    {
        $this->cartName = $cartName;
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
