<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class PromotionVariationPromotionPriority
{
    public string $typeDefinition = "";
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.RetailMedia.Promotion+ProductsVariationPromotionPriority, Relewise.Client")
        {
            return PromotionProductsVariationPromotionPriority::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.RetailMedia.Promotion+DisplayAdsVariationPromotionPriority, Relewise.Client")
        {
            return PromotionDisplayAdsVariationPromotionPriority::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
