<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductVariantAttributeSorting extends ProductSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Product.ProductVariantAttributeSorting, Relewise.Client";
    public ProductVariantAttributeSortingSortableAttribute $attribute;
    public SortMode $mode;
    public static function create(ProductVariantAttributeSortingSortableAttribute $attribute, SortOrder $order, SortMode $mode = SortMode::Auto) : ProductVariantAttributeSorting
    {
        $result = new ProductVariantAttributeSorting();
        $result->attribute = $attribute;
        $result->order = $order;
        $result->mode = $mode;
        return $result;
    }
    public static function hydrate(array $arr) : ProductVariantAttributeSorting
    {
        $result = ProductSorting::hydrateBase(new ProductVariantAttributeSorting(), $arr);
        if (array_key_exists("attribute", $arr))
        {
            $result->attribute = ProductVariantAttributeSortingSortableAttribute::from($arr["attribute"]);
        }
        if (array_key_exists("mode", $arr))
        {
            $result->mode = SortMode::from($arr["mode"]);
        }
        return $result;
    }
    /**
     * Sets attribute to a new value.
     * @param ProductVariantAttributeSortingSortableAttribute $attribute new value.
     */
    function setAttribute(ProductVariantAttributeSortingSortableAttribute $attribute)
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
