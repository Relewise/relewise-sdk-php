<?php declare(strict_types=1);

namespace Relewise\Models;

class PromotionSpecificationCollection
{
    public ?ProductPromotionSpecification $productPromotion;
    public static function create() : PromotionSpecificationCollection
    {
        $result = new PromotionSpecificationCollection();
        return $result;
    }
    public static function hydrate(array $arr) : PromotionSpecificationCollection
    {
        $result = new PromotionSpecificationCollection();
        if (array_key_exists("productPromotion", $arr))
        {
            $result->productPromotion = ProductPromotionSpecification::hydrate($arr["productPromotion"]);
        }
        return $result;
    }
    
    function setProductPromotion(?ProductPromotionSpecification $productPromotion)
    {
        $this->productPromotion = $productPromotion;
        return $this;
    }
}
