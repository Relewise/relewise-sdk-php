<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class stringstringKeyValuePair
{
    public string $key;
    public string $value;
    function __construct(string $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
    public static function create(string $key, string $value) : stringstringKeyValuePair
    {
        return new stringstringKeyValuePair($key, $value);
    }
    public static function hydrate(array $arr) : stringstringKeyValuePair
    {
        return stringstringKeyValuePair::create($arr["key"], $arr["value"]);
    }
}
