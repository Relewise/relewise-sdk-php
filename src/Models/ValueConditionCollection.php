<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a collection that contains multiple ValueConditions in its inner list Items. */
class ValueConditionCollection
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ValueConditionCollection, Relewise.Client";
    /** The items that the this collection holds. */
    public ?array $items;
    /**
     * Creates a collection that contains multiple ValueConditions in its inner list Items.
     * @param ValueCondition[] $conditions The items that the this collection holds.
     */
    public static function create(... $conditions) : ValueConditionCollection
    {
        $result = new ValueConditionCollection();
        $result->items = $conditions;
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
    /** The items that the this collection holds. */
    function setItems(ValueCondition ... $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * The items that the this collection holds.
     * @param ?ValueCondition[] $items new value.
     */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    /** The items that the this collection holds. */
    function addToItems(ValueCondition $items)
    {
        if (!isset($this->items))
        {
            $this->items = array();
        }
        array_push($this->items, $items);
        return $this;
    }
}
