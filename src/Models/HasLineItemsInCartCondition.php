<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class HasLineItemsInCartCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasLineItemsInCartCondition, Relewise.Client";
    public ?intRange $numberOfItems;
    public string $cartName;
    public FilterCollection $filters;
    public static function create(?intRange $numberOfItems, string $cartName = Null, FilterCollection $filters = Null, bool $negated = false) : HasLineItemsInCartCondition
    {
        $result = new HasLineItemsInCartCondition();
        $result->numberOfItems = $numberOfItems;
        $result->cartName = $cartName;
        $result->filters = $filters;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : HasLineItemsInCartCondition
    {
        $result = UserCondition::hydrateBase(new HasLineItemsInCartCondition(), $arr);
        if (array_key_exists("numberOfItems", $arr))
        {
            $result->numberOfItems = intRange::hydrate($arr["numberOfItems"]);
        }
        if (array_key_exists("cartName", $arr))
        {
            $result->cartName = $arr["cartName"];
        }
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        return $result;
    }
    /**
     * Sets numberOfItems to a new value.
     * @param ?intRange $numberOfItems new value.
     */
    function setNumberOfItems(?intRange $numberOfItems)
    {
        $this->numberOfItems = $numberOfItems;
        return $this;
    }
    /**
     * Sets cartName to a new value.
     * @param string $cartName new value.
     */
    function setCartName(string $cartName)
    {
        $this->cartName = $cartName;
        return $this;
    }
    /**
     * Sets filters to a new value.
     * @param FilterCollection $filters new value.
     */
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Sets negated to a new value.
     * @param bool $negated new value.
     */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
