<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

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
    function withCategory(ProductCategory $category)
    {
        $this->category = $category;
        return $this;
    }
    function withKind(CategoryUpdateUpdateKind $kind)
    {
        $this->kind = $kind;
        return $this;
    }
}
