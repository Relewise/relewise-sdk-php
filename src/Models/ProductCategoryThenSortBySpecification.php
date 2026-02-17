<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryThenSortBySpecification
{
    public static function create() : ProductCategoryThenSortBySpecification
    {
        $result = new ProductCategoryThenSortBySpecification();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductCategoryThenSortBySpecification
    {
        $result = new ProductCategoryThenSortBySpecification();
        return $result;
    }
}
