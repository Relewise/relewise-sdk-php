<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withAttribute(ProductVariantAttributeSortingSortableAttribute $attribute)
    {
        $this->attribute = $attribute;
        return $this;
    }
    function withMode(SortMode $mode)
    {
        $this->mode = $mode;
        return $this;
    }
    function withOrder(SortOrder $order)
    {
        $this->order = $order;
        return $this;
    }
    function withThenBy(ProductSorting $thenBy)
    {
        $this->thenBy = $thenBy;
        return $this;
    }
}
