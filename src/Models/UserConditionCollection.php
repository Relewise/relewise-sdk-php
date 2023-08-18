<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class UserConditionCollection
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.UserConditionCollection, Relewise.Client";
    public array $items;
    public static function create(UserCondition ... $conditions) : UserConditionCollection
    {
        $result = new UserConditionCollection();
        $result->items = $conditions;
        return $result;
    }
    public static function hydrate(array $arr) : UserConditionCollection
    {
        $result = new UserConditionCollection();
        if (array_key_exists("items", $arr))
        {
            $result->items = array();
            foreach($arr["items"] as &$value)
            {
                array_push($result->items, UserCondition::hydrate($value));
            }
        }
        return $result;
    }
    function setItems(UserCondition ... $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Sets items to a new value from an array.
     * @param UserCondition[] $items new value.
     */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Adds a new element to items.
     * @param UserCondition $items new element.
     */
    function addToItems(UserCondition $items)
    {
        if (!isset($this->items))
        {
            $this->items = array();
        }
        array_push($this->items, $items);
        return $this;
    }
}
