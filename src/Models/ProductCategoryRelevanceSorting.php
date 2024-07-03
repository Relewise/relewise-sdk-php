<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryRelevanceSorting extends ProductCategorySorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.ProductCategory.ProductCategoryRelevanceSorting, Relewise.Client";
    public static function create(SortOrder $order = SortOrder::Descending) : ProductCategoryRelevanceSorting
    {
        $result = new ProductCategoryRelevanceSorting();
        $result->order = $order;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryRelevanceSorting
    {
        $result = ProductCategorySorting::hydrateBase(new ProductCategoryRelevanceSorting(), $arr);
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
