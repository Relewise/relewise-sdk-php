<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductThenSortBySpecification
{
    public static function create() : ProductThenSortBySpecification
    {
        $result = new ProductThenSortBySpecification();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductThenSortBySpecification
    {
        $result = new ProductThenSortBySpecification();
        return $result;
    }
}
