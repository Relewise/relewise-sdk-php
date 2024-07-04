<?php declare(strict_types=1);

namespace Relewise\Models;

/** A selector which can change the weighing of an observed view or purchase when making a PopularProductsRequest. */
abstract class PopularityMultiplierSelector
{
    public string $typeDefinition = "";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.PopularityMultiplierSelectors.DataKeyPopularityMultiplierSelector, Relewise.Client")
        {
            return DataKeyPopularityMultiplierSelector::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
