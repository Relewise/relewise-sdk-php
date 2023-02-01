<?php declare(strict_types=1);

namespace Relewise\Models;

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
    function setValues(MultilingualValue ... $values)
    {
        $this->values = $values;
        return $this;
    }
    function setValuesFromArray(array $values)
    {
        $this->values = $values;
        return $this;
    }
    function addToValues(MultilingualValue $values)
    {
        if (!isset($this->values))
        {
            $this->values = array();
        }
        array_push($this->values, $values);
        return $this;
    }
}
