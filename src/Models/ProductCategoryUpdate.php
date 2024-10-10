<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryUpdate extends CategoryUpdate
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductCategoryUpdate, Relewise.Client";
    public ProductCategory $category;
    public static function create(ProductCategory $category, CategoryUpdateUpdateKind $kind = CategoryUpdateUpdateKind::UpdateAndAppend) : ProductCategoryUpdate
    {
        $result = new ProductCategoryUpdate();
        $result->category = $category;
        $result->kind = $kind;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryUpdate
    {
        $result = CategoryUpdate::hydrateBase(new ProductCategoryUpdate(), $arr);
        if (array_key_exists("category", $arr))
        {
            $result->category = ProductCategory::hydrate($arr["category"]);
        }
        return $result;
    }
    
    function setCategory(ProductCategory $category)
    {
        $this->category = $category;
        return $this;
    }
    
    function setKind(CategoryUpdateUpdateKind $kind)
    {
        $this->kind = $kind;
        return $this;
    }
}
