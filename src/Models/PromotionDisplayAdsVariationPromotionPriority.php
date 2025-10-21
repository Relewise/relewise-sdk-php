<?php declare(strict_types=1);

namespace Relewise\Models;

class PromotionDisplayAdsVariationPromotionPriority extends PromotionVariationPromotionPriority
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.Promotion+DisplayAdsVariationPromotionPriority, Relewise.Client";
    public static function create() : PromotionDisplayAdsVariationPromotionPriority
    {
        $result = new PromotionDisplayAdsVariationPromotionPriority();
        return $result;
    }
    
    public static function hydrate(array $arr) : PromotionDisplayAdsVariationPromotionPriority
    {
        $result = PromotionVariationPromotionPriority::hydrateBase(new PromotionDisplayAdsVariationPromotionPriority(), $arr);
        return $result;
    }
}
