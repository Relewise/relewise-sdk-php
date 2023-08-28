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
    /** The items that the this collection holds. */
    function setItems(RelevanceModifier ... $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * The items that the this collection holds.
     * @param ?RelevanceModifier[] $items new value.
     */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    /** The items that the this collection holds. */
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
