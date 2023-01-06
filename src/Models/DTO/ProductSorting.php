<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class ProductSorting extends ProductSortingSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Product.ProductSorting, Relewise.Client";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.Product.ProductAttributeSorting, Relewise.Client")
        {
            return ProductAttributeSorting::hydrate($arr);
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
        $result = ProductSortingSorting::hydrateBase($result, $arr);
        return $result;
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
