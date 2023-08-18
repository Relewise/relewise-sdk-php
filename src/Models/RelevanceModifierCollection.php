<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a collection that contains multiple RelevanceModifiers in its inner list Items. */
class RelevanceModifierCollection
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.RelevanceModifierCollection, Relewise.Client";
    /** The items that the this collection holds. */
    public ?array $items;
    /** Creates <inheritdoc cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifierCollection" path="/summary">            </inheritdoc> */
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
    function setItems(RelevanceModifier ... $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Sets items to a new value from an array.
     * @param ?RelevanceModifier[] $items new value.
     */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Adds a new element to items.
     * @param RelevanceModifier $items new element.
     */
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
