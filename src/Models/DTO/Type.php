<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class Type extends MemberInfo
{
    public string $typeDefinition = "System.Type, System.Private.CoreLib";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = MemberInfo::hydrateBase($result, $arr);
        return $result;
    }
}
