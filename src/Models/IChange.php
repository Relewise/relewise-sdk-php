<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** This is actually an interface. */
abstract class IChange
{
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Changes.Change, Relewise.Client")
        {
            return Change::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Changes.Decrease, Relewise.Client")
        {
            return Decrease::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Changes.Increase, Relewise.Client")
        {
            return Increase::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
