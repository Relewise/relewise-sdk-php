<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class KeyMultiplier
{
    public string $typeDefinition = "Relewise.Client.DataTypes.KeyMultiplier, Relewise.Client";
    public string $key;
    public float $multiplier;
    public static function create(string $key, float $multiplier) : KeyMultiplier
    {
        $result = new KeyMultiplier();
        $result->key = $key;
        $result->multiplier = $multiplier;
        return $result;
    }
    public static function hydrate(array $arr) : KeyMultiplier
    {
        $result = new KeyMultiplier();
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("multiplier", $arr))
        {
            $result->multiplier = $arr["multiplier"];
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
     * Sets multiplier to a new value.
     * @param float $multiplier new value.
     */
    function setMultiplier(float $multiplier)
    {
        $this->multiplier = $multiplier;
        return $this;
    }
}
