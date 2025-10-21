<?php declare(strict_types=1);

namespace Relewise\Models;

class PromotionProductsVariationPromotionPriority extends PromotionVariationPromotionPriority
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.Promotion+ProductsVariationPromotionPriority, Relewise.Client";
    public static function create() : PromotionProductsVariationPromotionPriority
    {
        $result = new PromotionProductsVariationPromotionPriority();
        return $result;
    }
    
    public static function hydrate(array $arr) : PromotionProductsVariationPromotionPriority
    {
        $result = PromotionVariationPromotionPriority::hydrateBase(new PromotionProductsVariationPromotionPriority(), $arr);
        return $result;
    }
}
