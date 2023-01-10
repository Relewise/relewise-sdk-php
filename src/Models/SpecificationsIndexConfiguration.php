<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SpecificationsIndexConfiguration
{
    public array $keys;
    public FieldIndexConfiguration $unspecified;
    public static function create() : SpecificationsIndexConfiguration
    {
        $result = new SpecificationsIndexConfiguration();
        return $result;
    }
    public static function hydrate(array $arr) : SpecificationsIndexConfiguration
    {
        $result = new SpecificationsIndexConfiguration();
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
    function addToKeys(string $key, FieldIndexConfiguration $value)
    {
        if (!isset($this->keys))
        {
            $this->keys = array();
        }
        $this->keys[$key] = $value;
        return $this;
    }
    function setUnspecified(FieldIndexConfiguration $unspecified)
    {
        $this->unspecified = $unspecified;
        return $this;
    }
}
