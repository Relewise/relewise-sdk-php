<?php declare(strict_types=1);

namespace Relewise\Models;

/** Used for specifying that this kind of promotion is allowed at a specific Location as well as for specific advertisers */
class ProductPromotionSpecificationVariation extends PromotionSpecificationVariation
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.ProductPromotion+SpecificationVariation, Relewise.Client";
    
    /** The maximum number of products to promote at a time in this variation. */
    public int $maxCount;
    
    public static function create(int $maxCount) : ProductPromotionSpecificationVariation
    {
        $result = new ProductPromotionSpecificationVariation();
        $result->maxCount = $maxCount;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductPromotionSpecificationVariation
    {
        $result = PromotionSpecificationVariation::hydrateBase(new ProductPromotionSpecificationVariation(), $arr);
        if (array_key_exists("maxCount", $arr))
        {
            $result->maxCount = $arr["maxCount"];
        }
        return $result;
    }
    
    /** The maximum number of products to promote at a time in this variation. */
    function setMaxCount(int $maxCount)
    {
        $this->maxCount = $maxCount;
        return $this;
    }
}
