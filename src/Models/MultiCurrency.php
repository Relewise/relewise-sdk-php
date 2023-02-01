<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class MultiCurrency
{
    public ?array $values;
    public static function create(Money ... $amounts) : MultiCurrency
    {
        $result = new MultiCurrency();
        $result->values = $amounts;
        return $result;
    }
    public static function hydrate(array $arr) : MultiCurrency
    {
        $result = new MultiCurrency();
        if (array_key_exists("values", $arr))
        {
            $result->values = array();
            foreach($arr["values"] as &$value)
            {
                array_push($result->values, Money::hydrate($value));
            }
        }
        return $result;
    }
    function setValues(Money ... $values)
    {
        $this->values = $values;
        return $this;
    }
    function setValuesFromArray(array $values)
    {
        $this->values = $values;
        return $this;
    }
    function addToValues(Money $values)
    {
        if (!isset($this->values))
        {
            $this->values = array();
        }
        array_push($this->values, $values);
        return $this;
    }
}
