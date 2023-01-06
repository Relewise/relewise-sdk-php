<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class MemberInfo
{
    public string $typeDefinition = "System.Reflection.MemberInfo, System.Private.CoreLib";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
