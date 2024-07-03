<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class Enum extends ValueType
{
    public string $typeDefinition = "System.Enum, System.Private.CoreLib";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = ValueType::hydrateBase($result, $arr);
        return $result;
    }
}
