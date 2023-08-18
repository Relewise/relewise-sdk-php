<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategorySortBySpecification
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.ProductCategory.ProductCategorySortBySpecification, Relewise.Client";
    public ProductCategorySorting $value;
    public static function create() : ProductCategorySortBySpecification
    {
        $result = new ProductCategorySortBySpecification();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategorySortBySpecification
    {
        $result = new ProductCategorySortBySpecification();
        if (array_key_exists("value", $arr))
        {
            $result->value = ProductCategorySorting::hydrate($arr["value"]);
        }
        return $result;
    }
    function setValue(ProductCategorySorting $value)
    {
        $this->value = $value;
        return $this;
    }
}
