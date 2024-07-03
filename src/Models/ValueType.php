<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class ValueType
{
    public string $typeDefinition = "";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
