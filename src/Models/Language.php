<?php declare(strict_types=1);

namespace Relewise\Models;

class Language
{
    /** Trimmed language name in lower-invariant. */
    public string $value;
    const UNDEFINED = Null;
    public static function create(string $name) : Language
    {
        $result = new Language();
        $result->value = $name;
        return $result;
    }
    
    public static function hydrate(array $arr) : Language
    {
        $result = new Language();
        if (array_key_exists("value", $arr))
        {
            $result->value = $arr["value"];
        }
        return $result;
    }
    
    /** Trimmed language name in lower-invariant. */
    function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }
}
