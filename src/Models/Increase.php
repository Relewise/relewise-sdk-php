<?php declare(strict_types=1);

namespace Relewise\Models;

/** Indicates that some property should change by increasing in value. */
class Increase implements IChange
{
    public static function create() : Increase
    {
        $result = new Increase();
        return $result;
    }
    
    public static function hydrate(array $arr) : Increase
    {
        $result = new Increase();
        return $result;
    }
}
