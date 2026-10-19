<?php declare(strict_types=1);

namespace Relewise\Models;

/** A condition that decides whether a merchandising rule applies based on values supplied with a request, such as device type or test variant. Batch defaults are combined with the request's own values before matching. */
abstract class ContextValueCondition
{
    public string $typeDefinition = "";
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Merchandising.ContextValuesMatchCondition, Relewise.Client")
        {
            return ContextValuesMatchCondition::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
