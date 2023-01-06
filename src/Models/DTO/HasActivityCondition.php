<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class HasActivityCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasActivityCondition, Relewise.Client";
    public int $withinMinutes;
    public int $forAtLeastSeconds;
    public static function create(bool $negated) : HasActivityCondition
    {
        $result = new HasActivityCondition();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : HasActivityCondition
    {
        $result = UserCondition::hydrateBase(new HasActivityCondition(), $arr);
        if (array_key_exists("withinMinutes", $arr))
        {
            $result->withinMinutes = $arr["withinMinutes"];
        }
        if (array_key_exists("forAtLeastSeconds", $arr))
        {
            $result->forAtLeastSeconds = $arr["forAtLeastSeconds"];
        }
        return $result;
    }
    function withWithinMinutes(int $withinMinutes)
    {
        $this->withinMinutes = $withinMinutes;
        return $this;
    }
    function withForAtLeastSeconds(int $forAtLeastSeconds)
    {
        $this->forAtLeastSeconds = $forAtLeastSeconds;
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
