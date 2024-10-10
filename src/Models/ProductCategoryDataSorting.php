<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryDataSorting extends ProductCategorySorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.ProductCategory.ProductCategoryDataSorting, Relewise.Client";
    public string $key;
    
    public SortMode $mode;
    
    public static function create(string $key, SortOrder $order, SortMode $mode = SortMode::Auto) : ProductCategoryDataSorting
    {
        $result = new ProductCategoryDataSorting();
        $result->key = $key;
        $result->order = $order;
        $result->mode = $mode;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductCategoryDataSorting
    {
        $result = ProductCategorySorting::hydrateBase(new ProductCategoryDataSorting(), $arr);
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
    
    function setThenBy(ProductCategorySorting $thenBy)
    {
        $this->thenBy = $thenBy;
        return $this;
    }
}
