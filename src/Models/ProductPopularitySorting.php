<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductPopularitySorting extends ProductSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Product.ProductPopularitySorting, Relewise.Client";
    public static function create(SortOrder $order = SortOrder::Descending) : ProductPopularitySorting
    {
        $result = new ProductPopularitySorting();
        $result->order = $order;
        return $result;
    }
    public static function hydrate(array $arr) : ProductPopularitySorting
    {
        $result = ProductSorting::hydrateBase(new ProductPopularitySorting(), $arr);
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
     * @param ProductSorting $thenBy new value.
     */
    function setThenBy(ProductSorting $thenBy)
    {
        $this->thenBy = $thenBy;
        return $this;
    }
}
