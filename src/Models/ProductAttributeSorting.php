<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductAttributeSorting extends ProductSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Product.ProductAttributeSorting, Relewise.Client";
    public ProductAttributeSortingSortableAttribute $attribute;
    public SortMode $mode;
    public static function create(ProductAttributeSortingSortableAttribute $attribute, SortOrder $order, SortMode $mode = SortMode::Auto) : ProductAttributeSorting
    {
        $result = new ProductAttributeSorting();
        $result->attribute = $attribute;
        $result->order = $order;
        $result->mode = $mode;
        return $result;
    }
    public static function hydrate(array $arr) : ProductAttributeSorting
    {
        $result = ProductSorting::hydrateBase(new ProductAttributeSorting(), $arr);
        if (array_key_exists("attribute", $arr))
        {
            $result->attribute = ProductAttributeSortingSortableAttribute::from($arr["attribute"]);
        }
        if (array_key_exists("mode", $arr))
        {
            $result->mode = SortMode::from($arr["mode"]);
        }
        return $result;
    }
    /**
     * Sets attribute to a new value.
     * @param ProductAttributeSortingSortableAttribute $attribute new value.
     */
    function setAttribute(ProductAttributeSortingSortableAttribute $attribute)
    {
        $this->attribute = $attribute;
        return $this;
    }
    /**
     * Sets mode to a new value.
     * @param SortMode $mode new value.
     */
    function setMode(SortMode $mode)
    {
        $this->mode = $mode;
        return $this;
    }
    /**
     * Sets order to a new value.
     * @param SortOrder $order new value.
     */
    function setOrder(SortOrder $order)
    {
        $this->order = $order;
        return $this;
    }
    /**
     * Sets thenBy to a new value.
     * @param ProductSorting $thenBy new value.
     */
    function setThenBy(ProductSorting $thenBy)
    {
        $this->thenBy = $thenBy;
        return $this;
    }
}
