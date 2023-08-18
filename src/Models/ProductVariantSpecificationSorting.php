<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductVariantSpecificationSorting extends ProductSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Product.ProductVariantSpecificationSorting, Relewise.Client";
    public string $key;
    public SortMode $mode;
    public static function create(string $key, SortOrder $order, SortMode $mode = SortMode::Auto) : ProductVariantSpecificationSorting
    {
        $result = new ProductVariantSpecificationSorting();
        $result->key = $key;
        $result->order = $order;
        $result->mode = $mode;
        return $result;
    }
    public static function hydrate(array $arr) : ProductVariantSpecificationSorting
    {
        $result = ProductSorting::hydrateBase(new ProductVariantSpecificationSorting(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("mode", $arr))
        {
            $result->mode = SortMode::from($arr["mode"]);
        }
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setMode(SortMode $mode)
    {
        $this->mode = $mode;
        return $this;
    }
    function setOrder(SortOrder $order)
    {
        $this->order = $order;
        return $this;
    }
    function setThenBy(ProductSorting $thenBy)
    {
        $this->thenBy = $thenBy;
        return $this;
    }
}
