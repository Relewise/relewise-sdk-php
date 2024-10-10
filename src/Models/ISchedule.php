<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** This is actually an interface. */
abstract class ISchedule
{
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.RetailMedia.ScheduledPeriod, Relewise.Client")
        {
            return ScheduledPeriod::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
