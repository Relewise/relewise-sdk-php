<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentThenSortBySpecification
{
    public static function create() : ContentThenSortBySpecification
    {
        $result = new ContentThenSortBySpecification();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentThenSortBySpecification
    {
        $result = new ContentThenSortBySpecification();
        return $result;
    }
}
