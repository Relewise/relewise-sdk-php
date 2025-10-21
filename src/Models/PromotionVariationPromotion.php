<?php declare(strict_types=1);

namespace Relewise\Models;

/** Used for specifying that this kind of promotion is allowed at a specific location */
class PromotionVariationPromotion extends PromotionSpecificationVariation
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.Promotion+VariationPromotion, Relewise.Client";
    /** The maximum number of promotions (Products/DisplayAds) to promote in this variation */
    public int $maxCount;
    /** The preferred number of products to be promoted. If 0, then no products will be returned. */
    public ?int $preferredNumberOfProducts;
    /** The preferred number of display ads to be promoted. If 0, then no display ads will be returned. */
    public ?int $preferredNumberOfDisplayAds;
    /** The promotion elements priority */
    public ?PromotionVariationPromotionPriority $priority;
    
    public static function create(int $maxCount, ?int $preferredNumberOfProducts = Null, ?int $preferredNumberOfDisplayAds = Null, ?PromotionVariationPromotionPriority $priority = Null) : PromotionVariationPromotion
    {
        $result = new PromotionVariationPromotion();
        $result->maxCount = $maxCount;
        $result->preferredNumberOfProducts = $preferredNumberOfProducts;
        $result->preferredNumberOfDisplayAds = $preferredNumberOfDisplayAds;
        $result->priority = $priority;
        return $result;
    }
    
    public static function hydrate(array $arr) : PromotionVariationPromotion
    {
        $result = PromotionSpecificationVariation::hydrateBase(new PromotionVariationPromotion(), $arr);
        if (array_key_exists("maxCount", $arr))
        {
            $result->maxCount = $arr["maxCount"];
        }
        if (array_key_exists("preferredNumberOfProducts", $arr))
        {
            $result->preferredNumberOfProducts = $arr["preferredNumberOfProducts"];
        }
        if (array_key_exists("preferredNumberOfDisplayAds", $arr))
        {
            $result->preferredNumberOfDisplayAds = $arr["preferredNumberOfDisplayAds"];
        }
        if (array_key_exists("priority", $arr))
        {
            $result->priority = PromotionVariationPromotionPriority::hydrate($arr["priority"]);
        }
        return $result;
    }
    
    /** The maximum number of promotions (Products/DisplayAds) to promote in this variation */
    function setMaxCount(int $maxCount)
    {
        $this->maxCount = $maxCount;
        return $this;
    }
    
    /** The preferred number of products to be promoted. If 0, then no products will be returned. */
    function setPreferredNumberOfProducts(?int $preferredNumberOfProducts)
    {
        $this->preferredNumberOfProducts = $preferredNumberOfProducts;
        return $this;
    }
    
    /** The preferred number of display ads to be promoted. If 0, then no display ads will be returned. */
    function setPreferredNumberOfDisplayAds(?int $preferredNumberOfDisplayAds)
    {
        $this->preferredNumberOfDisplayAds = $preferredNumberOfDisplayAds;
        return $this;
    }
    
    /** The promotion elements priority */
    function setPriority(?PromotionVariationPromotionPriority $priority)
    {
        $this->priority = $priority;
        return $this;
    }
}
