<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductRelevanceSorting extends ProductSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Product.ProductRelevanceSorting, Relewise.Client";
    
    public static function create(SortOrder $order = SortOrder::Descending) : ProductRelevanceSorting
    {
        $result = new ProductRelevanceSorting();
        $result->order = $order;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductRelevanceSorting
    {
        $result = ProductSorting::hydrateBase(new ProductRelevanceSorting(), $arr);
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
