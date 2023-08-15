<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a collection that contains multiple ValueConditions in its inner list Items. */
class ValueConditionCollection
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ValueConditionCollection, Relewise.Client";
    /** The items that the this collection holds. */
    public ?array $items;
    /** Creates <inheritdoc cref="T:Relewise.Client.Requests.RelevanceModifiers.ValueConditionCollection" path="/summary">            </inheritdoc> */
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
    /**
     * Sets items to a new value.
     * @param ?ValueCondition[] $items new value.
     */
    function setItems(ValueCondition ... $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Sets items to a new value from an array.
     * @param ?ValueCondition[] $items new value.
     */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Adds a new element to items.
     * @param ValueCondition $items new element.
     */
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
