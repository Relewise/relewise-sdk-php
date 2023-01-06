<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class Multilingual
{
    public ?array $values;
    public static function create(MultilingualValue ... $translations) : Multilingual
    {
        $result = new Multilingual();
        $result->values = $translations;
        return $result;
    }
    public static function hydrate(array $arr) : Multilingual
    {
        $result = new Multilingual();
        if (array_key_exists("values", $arr))
        {
            $result->values = array();
            foreach($arr["values"] as &$value)
            {
                array_push($result->values, MultilingualValue::hydrate($value));
            }
        }
        return $result;
    }
    function withValues(MultilingualValue ... $values)
    {
        $this->values = $values;
        return $this;
    }
}
