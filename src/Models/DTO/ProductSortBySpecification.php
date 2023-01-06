<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductSortBySpecification
{
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
    function withValue(ProductSorting $value)
    {
        $this->value = $value;
        return $this;
    }
}
