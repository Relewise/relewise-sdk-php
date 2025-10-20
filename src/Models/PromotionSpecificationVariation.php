<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class PromotionSpecificationVariation
{
    public string $typeDefinition = "";
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.RetailMedia.ProductPromotion+SpecificationVariation, Relewise.Client")
        {
            return ProductPromotionSpecificationVariation::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.RetailMedia.Promotion+VariationPromotion, Relewise.Client")
        {
            return PromotionVariationPromotion::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
