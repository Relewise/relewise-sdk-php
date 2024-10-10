<?php declare(strict_types=1);

namespace Relewise\Models;

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
    
    function setWithinMinutes(int $withinMinutes)
    {
        $this->withinMinutes = $withinMinutes;
        return $this;
    }
    
    function setCartName(string $cartName)
    {
        $this->cartName = $cartName;
        return $this;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
