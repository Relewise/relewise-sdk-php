<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class ValueType
{
    public string $typeDefinition = "System.ValueType, System.Private.CoreLib";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
