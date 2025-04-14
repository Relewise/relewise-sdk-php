<?php declare(strict_types=1);

namespace Relewise\Models;

/** Conditions for Retail Media engine to be applied. */
abstract class RetailMediaConditions
{
    public string $typeDefinition = "";
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.RetailMedia.Campaign+CampaignConditions, Relewise.Client")
        {
            return CampaignCampaignConditions::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.RetailMedia.ProductPromotion+PromotionConditions, Relewise.Client")
        {
            return ProductPromotionPromotionConditions::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
