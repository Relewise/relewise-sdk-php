<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class Language
{
    public string $value;
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
    function withValue(string $value)
    {
        $this->value = $value;
        return $this;
    }
}
