<?php declare(strict_types=1);

namespace Relewise\Models;

/** Used for specifying that this kind of promotion is allowed at a specific Location as well as for specific advertisers */
class ProductPromotionSpecification extends PromotionSpecification
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.ProductPromotion+Specification, Relewise.Client";
    /** Filters matching the products which may be promoted */
    public ?FilterCollection $promotableProducts;
    public static function create(?FilterCollection $promotableProducts) : ProductPromotionSpecification
    {
        $result = new ProductPromotionSpecification();
        $result->promotableProducts = $promotableProducts;
        return $result;
    }
    public static function hydrate(array $arr) : ProductPromotionSpecification
    {
        $result = PromotionSpecification::hydrateBase(new ProductPromotionSpecification(), $arr);
        if (array_key_exists("promotableProducts", $arr))
        {
            $result->promotableProducts = FilterCollection::hydrate($arr["promotableProducts"]);
        }
        return $result;
    }
    /** Filters matching the products which may be promoted */
    function setPromotableProducts(?FilterCollection $promotableProducts)
    {
        $this->promotableProducts = $promotableProducts;
        return $this;
    }
}
