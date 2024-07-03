<?php declare(strict_types=1);

namespace Relewise\Models;

/** a collection that contains multiple RelevanceModifiers in its inner list Items. */
class RelevanceModifierCollection
{
    /** The items that the collection holds. */
    public ?array $items;
    /**
     * Creates a collection that contains multiple RelevanceModifiers in its inner list Items.
     * @param RelevanceModifier[] $relevanceModifiers The items that the collection holds.
     */
    public static function create(RelevanceModifier ... $relevanceModifiers) : RelevanceModifierCollection
    {
        $result = new RelevanceModifierCollection();
        $result->items = $relevanceModifiers;
        return $result;
    }
    public static function hydrate(array $arr) : RelevanceModifierCollection
    {
        $result = new RelevanceModifierCollection();
        if (array_key_exists("items", $arr))
        {
            $result->items = array();
            foreach($arr["items"] as &$value)
            {
                array_push($result->items, RelevanceModifier::hydrate($value));
            }
        }
        return $result;
    }
    /** The items that the collection holds. */
    function setItems(RelevanceModifier ... $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * The items that the collection holds.
     * @param ?RelevanceModifier[] $items new value.
     */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    /** The items that the collection holds. */
    function addToItems(RelevanceModifier $items)
    {
        if (!isset($this->items))
        {
            $this->items = array();
        }
        array_push($this->items, $items);
        return $this;
    }
}
