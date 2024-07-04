<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class PromotionSpecification
{
    public string $typeDefinition = "";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.RetailMedia.ProductPromotion+Specification, Relewise.Client")
        {
            return ProductPromotionSpecification::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
