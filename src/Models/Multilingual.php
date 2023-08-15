<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class Multilingual
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Multilingual, Relewise.Client";
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
    /**
     * Sets values to a new value.
     * @param ?MultilingualValue[] $values new value.
     */
    function setValues(MultilingualValue ... $values)
    {
        $this->values = $values;
        return $this;
    }
    /**
     * Sets values to a new value from an array.
     * @param ?MultilingualValue[] $values new value.
     */
    function setValuesFromArray(array $values)
    {
        $this->values = $values;
        return $this;
    }
    /**
     * Adds a new element to values.
     * @param MultilingualValue $values new element.
     */
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
