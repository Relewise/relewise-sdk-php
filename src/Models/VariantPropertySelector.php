<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class VariantPropertySelector
{
    public string $typeDefinition = "Relewise.Client.DataTypes.EntityPropertySelectors.VariantPropertySelector, Relewise.Client";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.EntityPropertySelectors.ObservableVariantAttributeSelector, Relewise.Client")
        {
            return ObservableVariantAttributeSelector::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.EntityPropertySelectors.ObservableVariantDataValueSelector, Relewise.Client")
        {
            return ObservableVariantDataValueSelector::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
