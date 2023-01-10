<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class ProductCategorySortingSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Sorting`1[[Relewise.Client.DataTypes.Search.Sorting.ProductCategory.ProductCategorySorting, Relewise.Client, Version=1.56.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public SortOrder $order;
    public ProductCategorySorting $thenBy;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.ProductCategory.ProductCategoryAttributeSorting, Relewise.Client")
        {
            return ProductCategoryAttributeSorting::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.ProductCategory.ProductCategoryDataSorting, Relewise.Client")
        {
            return ProductCategoryDataSorting::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.ProductCategory.ProductCategoryPopularitySorting, Relewise.Client")
        {
            return ProductCategoryPopularitySorting::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.ProductCategory.ProductCategoryRelevanceSorting, Relewise.Client")
        {
            return ProductCategoryRelevanceSorting::hydrate($arr);
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
            $result->thenBy = ProductCategorySorting::hydrate($arr["thenBy"]);
        }
        return $result;
    }
    function setOrder(SortOrder $order)
    {
        $this->order = $order;
        return $this;
    }
    function setThenBy(ProductCategorySorting $thenBy)
    {
        $this->thenBy = $thenBy;
        return $this;
    }
}
