<?php declare(strict_types=1);

namespace Relewise\Models;

class PromotionSpecificationCollection
{
    public ?ProductPromotionSpecification $productPromotion;
    public ?DisplayAdPromotionSpecification $displayAdPromotion;
    
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
        if (array_key_exists("displayAdPromotion", $arr))
        {
            $result->displayAdPromotion = DisplayAdPromotionSpecification::hydrate($arr["displayAdPromotion"]);
        }
        return $result;
    }
    
    function setProductPromotion(?ProductPromotionSpecification $productPromotion)
    {
        $this->productPromotion = $productPromotion;
        return $this;
    }
    
    function setDisplayAdPromotion(?DisplayAdPromotionSpecification $displayAdPromotion)
    {
        $this->displayAdPromotion = $displayAdPromotion;
        return $this;
    }
}
