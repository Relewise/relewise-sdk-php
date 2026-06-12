<?php declare(strict_types=1);

namespace Relewise\Models\Internal;

use Relewise\Models;

/** Hydrator helper for this interface. */
class IScheduleHydrator
{
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Scheduling.ScheduledPeriod, Relewise.Client")
        {
            return Models\ScheduledPeriod::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
