<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

// This is actually an interface.
abstract class IEntityPropertySelector
{
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.EntityPropertySelectors.ObservableProductAttributeSelector, Relewise.Client")
        {
            return ObservableProductAttributeSelector::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.EntityPropertySelectors.ObservableProductDataValueSelector, Relewise.Client")
        {
            return ObservableProductDataValueSelector::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
