<?php declare(strict_types=1);

namespace Relewise\Models;

/** Indicates that some property should change by having a new value which is still of the same type. */
class Change
{
    public static function create() : Change
    {
        $result = new Change();
        return $result;
    }
    
    public static function hydrate(array $arr) : Change
    {
        $result = new Change();
        return $result;
    }
}
