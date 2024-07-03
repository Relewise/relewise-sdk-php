<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductSortBySpecification
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Product.ProductSortBySpecification, Relewise.Client";
    public ProductSorting $value;
    public static function create() : ProductSortBySpecification
    {
        $result = new ProductSortBySpecification();
        return $result;
    }
    public static function hydrate(array $arr) : ProductSortBySpecification
    {
        $result = new ProductSortBySpecification();
        if (array_key_exists("value", $arr))
        {
            $result->value = ProductSorting::hydrate($arr["value"]);
        }
        return $result;
    }
    function setValue(ProductSorting $value)
    {
        $this->value = $value;
        return $this;
    }
}
