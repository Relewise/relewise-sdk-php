<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class ValueSelector
{
    public string $typeDefinition = "";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.ValueSelectors.DataDoubleSelector, Relewise.Client")
        {
            return DataDoubleSelector::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.ValueSelectors.FixedDoubleValueSelector, Relewise.Client")
        {
            return FixedDoubleValueSelector::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
