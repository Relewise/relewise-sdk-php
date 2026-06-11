<?php declare(strict_types=1);

namespace Relewise\Models\Internal;

use Relewise\Models;

/** Hydrator helper for this interface. */
class IChangeHydrator
{
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Changes.Change, Relewise.Client")
        {
            return Models\Change::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Changes.Decrease, Relewise.Client")
        {
            return Models\Decrease::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Changes.Increase, Relewise.Client")
        {
            return Models\Increase::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
