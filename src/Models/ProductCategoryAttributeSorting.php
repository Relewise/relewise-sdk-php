<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryAttributeSorting extends ProductCategorySorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.ProductCategory.ProductCategoryAttributeSorting, Relewise.Client";
    public ProductCategoryAttributeSortingSortableAttribute $attribute;
    public SortMode $mode;
    
    public static function create(ProductCategoryAttributeSortingSortableAttribute $attribute, SortOrder $order, SortMode $mode = SortMode::Auto) : ProductCategoryAttributeSorting
    {
        $result = new ProductCategoryAttributeSorting();
        $result->attribute = $attribute;
        $result->order = $order;
        $result->mode = $mode;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductCategoryAttributeSorting
    {
        $result = ProductCategorySorting::hydrateBase(new ProductCategoryAttributeSorting(), $arr);
        if (array_key_exists("attribute", $arr))
        {
            $result->attribute = ProductCategoryAttributeSortingSortableAttribute::from($arr["attribute"]);
        }
        if (array_key_exists("mode", $arr))
        {
            $result->mode = SortMode::from($arr["mode"]);
        }
        return $result;
    }
    
    function setAttribute(ProductCategoryAttributeSortingSortableAttribute $attribute)
    {
        $this->attribute = $attribute;
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
