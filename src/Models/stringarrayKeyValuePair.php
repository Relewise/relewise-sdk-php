<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class stringarrayKeyValuePair
{
    public string $key;
    
    public array $value;
    
    function __construct(string $key, array $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
    
    public static function create(string $key, array $value) : stringarrayKeyValuePair
    {
        return new stringarrayKeyValuePair($key, $value);
    }
    
    public static function hydrate(array $arr) : stringarrayKeyValuePair
    {
        return stringarrayKeyValuePair::create($arr["key"], $arr["value"]);
    }
}
