<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategorySortBySpecification
{
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
