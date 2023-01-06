<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
