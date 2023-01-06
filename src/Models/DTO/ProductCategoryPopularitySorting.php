<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryPopularitySorting extends ProductCategorySorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.ProductCategory.ProductCategoryPopularitySorting, Relewise.Client";
    public static function create(SortOrder $order = SortOrder::Descending) : ProductCategoryPopularitySorting
    {
        $result = new ProductCategoryPopularitySorting();
        $result->order = $order;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryPopularitySorting
    {
        $result = ProductCategorySorting::hydrateBase(new ProductCategoryPopularitySorting(), $arr);
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
