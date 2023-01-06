<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class HasLineItemsInCartCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.HasLineItemsInCartCondition, Relewise.Client";
    public ?intRange $numberOfItems;
    public string $cartName;
    public FilterCollection $filters;
    public static function create(?intRange $numberOfItems, string $cartName = Null, FilterCollection $filters, bool $negated = false) : HasLineItemsInCartCondition
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
    function withNumberOfItems(?intRange $numberOfItems)
    {
        $this->numberOfItems = $numberOfItems;
        return $this;
    }
    function withCartName(string $cartName)
    {
        $this->cartName = $cartName;
        return $this;
    }
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
