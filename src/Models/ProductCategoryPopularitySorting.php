<?php declare(strict_types=1);

namespace Relewise\Models;

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
     * @param ProductCategorySorting $thenBy new value.
     */
    function setThenBy(ProductCategorySorting $thenBy)
    {
        $this->thenBy = $thenBy;
        return $this;
    }
}
