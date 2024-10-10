<?php declare(strict_types=1);

namespace Relewise\Models;

class PromotionSpecificationVariationCollection
{
    public ?ProductPromotionSpecificationVariation $productPromotion;
    
    public static function create() : PromotionSpecificationVariationCollection
    {
        $result = new PromotionSpecificationVariationCollection();
        return $result;
    }
    
    public static function hydrate(array $arr) : PromotionSpecificationVariationCollection
    {
        $result = new PromotionSpecificationVariationCollection();
        if (array_key_exists("productPromotion", $arr))
        {
            $result->productPromotion = ProductPromotionSpecificationVariation::hydrate($arr["productPromotion"]);
        }
        return $result;
    }
    
    function setProductPromotion(?ProductPromotionSpecificationVariation $productPromotion)
    {
        $this->productPromotion = $productPromotion;
        return $this;
    }
}
