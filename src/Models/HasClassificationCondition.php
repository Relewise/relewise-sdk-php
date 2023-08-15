<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class HasClassificationCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasClassificationCondition, Relewise.Client";
    public string $key;
    public string $value;
    public static function create(string $key, bool $negated) : HasClassificationCondition
    {
        $result = new HasClassificationCondition();
        $result->key = $key;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : HasClassificationCondition
    {
        $result = UserCondition::hydrateBase(new HasClassificationCondition(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("value", $arr))
        {
            $result->value = $arr["value"];
        }
        return $result;
    }
    /**
     * Sets key to a new value.
     * @param string $key new value.
     */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    /**
     * Sets value to a new value.
     * @param string $value new value.
     */
    function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }
    /**
     * Sets negated to a new value.
     * @param bool $negated new value.
     */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
