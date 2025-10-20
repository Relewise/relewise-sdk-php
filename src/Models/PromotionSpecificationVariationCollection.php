<?php declare(strict_types=1);

namespace Relewise\Models;

class PromotionSpecificationVariationCollection
{
    /** @deprecated Use VariationPromotion instead */
    public ?ProductPromotionSpecificationVariation $productPromotion;
    public ?PromotionVariationPromotion $variationPromotion;
    
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
        if (array_key_exists("variationPromotion", $arr))
        {
            $result->variationPromotion = PromotionVariationPromotion::hydrate($arr["variationPromotion"]);
        }
        return $result;
    }
    
    /** @deprecated Use VariationPromotion instead */
    function setProductPromotion(?ProductPromotionSpecificationVariation $productPromotion)
    {
        $this->productPromotion = $productPromotion;
        return $this;
    }
    
    function setVariationPromotion(?PromotionVariationPromotion $variationPromotion)
    {
        $this->variationPromotion = $variationPromotion;
        return $this;
    }
}
