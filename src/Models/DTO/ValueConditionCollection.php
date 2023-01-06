<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ValueConditionCollection
{
    public ?array $items;
    public static function create() : ValueConditionCollection
    {
        $result = new ValueConditionCollection();
        return $result;
    }
    public static function hydrate(array $arr) : ValueConditionCollection
    {
        $result = new ValueConditionCollection();
        if (array_key_exists("items", $arr))
        {
            $result->items = array();
            foreach($arr["items"] as &$value)
            {
                array_push($result->items, ValueCondition::hydrate($value));
            }
        }
        return $result;
    }
    function setItems(ValueCondition ... $items)
    {
        $this->items = $items;
        return $this;
    }
}
