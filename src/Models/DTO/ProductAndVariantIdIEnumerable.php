<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

// This is actually an interface.
abstract class ProductAndVariantIdIEnumerable
{
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
