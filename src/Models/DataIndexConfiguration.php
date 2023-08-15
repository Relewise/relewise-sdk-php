<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class DataIndexConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.DataIndexConfiguration, Relewise.Client";
    public array $keys;
    public FieldIndexConfiguration $unspecified;
    public static function create() : DataIndexConfiguration
    {
        $result = new DataIndexConfiguration();
        return $result;
    }
    public static function hydrate(array $arr) : DataIndexConfiguration
    {
        $result = new DataIndexConfiguration();
        if (array_key_exists("keys", $arr))
        {
            $result->keys = array();
            foreach($arr["keys"] as $key => $value)
            {
                $result->keys[$key] = FieldIndexConfiguration::hydrate($value);
            }
        }
        if (array_key_exists("unspecified", $arr))
        {
            $result->unspecified = FieldIndexConfiguration::hydrate($arr["unspecified"]);
        }
        return $result;
    }
    /**
     * Sets the value of a specific key in keys.
     * @param string $key index.
     * @param FieldIndexConfiguration $value new value.
     */
    function addToKeys(string $key, FieldIndexConfiguration $value)
    {
        if (!isset($this->keys))
        {
            $this->keys = array();
        }
        $this->keys[$key] = $value;
        return $this;
    }
    /**
     * Sets keys to a new value.
     * @param array<string, FieldIndexConfiguration> $keys associative array.
     */
    function setKeysFromAssociativeArray(array $keys)
    {
        $this->keys = $keys;
        return $this;
    }
    /**
     * Sets unspecified to a new value.
     * @param FieldIndexConfiguration $unspecified new value.
     */
    function setUnspecified(FieldIndexConfiguration $unspecified)
    {
        $this->unspecified = $unspecified;
        return $this;
    }
}
