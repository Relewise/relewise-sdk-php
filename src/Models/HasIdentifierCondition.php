<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class HasIdentifierCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasIdentifierCondition, Relewise.Client";
    public string $key;
    public static function create(string $key, bool $negated) : HasIdentifierCondition
    {
        $result = new HasIdentifierCondition();
        $result->key = $key;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : HasIdentifierCondition
    {
        $result = UserCondition::hydrateBase(new HasIdentifierCondition(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
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
     * Sets negated to a new value.
     * @param bool $negated new value.
     */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
