<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class ProductSortingSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Sorting`1[[Relewise.Client.DataTypes.Search.Sorting.Product.ProductSorting, Relewise.Client, Version=1.156.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public SortOrder $order;
    public ProductSorting $thenBy;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.Product.ProductAttributeSorting, Relewise.Client")
        {
            return ProductAttributeSorting::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.Product.ProductDataObjectSorting, Relewise.Client")
        {
            return ProductDataObjectSorting::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.Product.ProductDataSorting, Relewise.Client")
        {
            return ProductDataSorting::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.Product.ProductPopularitySorting, Relewise.Client")
        {
            return ProductPopularitySorting::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.Product.ProductRelevanceSorting, Relewise.Client")
        {
            return ProductRelevanceSorting::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.Product.ProductVariantAttributeSorting, Relewise.Client")
        {
            return ProductVariantAttributeSorting::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.Product.ProductVariantSpecificationSorting, Relewise.Client")
        {
            return ProductVariantSpecificationSorting::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("order", $arr))
        {
            $result->order = SortOrder::from($arr["order"]);
        }
        if (array_key_exists("thenBy", $arr))
        {
            $result->thenBy = ProductSorting::hydrate($arr["thenBy"]);
        }
        return $result;
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
