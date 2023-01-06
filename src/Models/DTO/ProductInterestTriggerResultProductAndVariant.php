<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductInterestTriggerResultProductAndVariant
{
    public ProductResultDetails $product;
    public VariantResultDetails $variant;
    public int $views;
    public static function create() : ProductInterestTriggerResultProductAndVariant
    {
        $result = new ProductInterestTriggerResultProductAndVariant();
        return $result;
    }
    public static function hydrate(array $arr) : ProductInterestTriggerResultProductAndVariant
    {
        $result = new ProductInterestTriggerResultProductAndVariant();
        if (array_key_exists("product", $arr))
        {
            $result->product = ProductResultDetails::hydrate($arr["product"]);
        }
        if (array_key_exists("variant", $arr))
        {
            $result->variant = VariantResultDetails::hydrate($arr["variant"]);
        }
        if (array_key_exists("views", $arr))
        {
            $result->views = $arr["views"];
        }
        return $result;
    }
    function withProduct(ProductResultDetails $product)
    {
        $this->product = $product;
        return $this;
    }
    function withVariant(VariantResultDetails $variant)
    {
        $this->variant = $variant;
        return $this;
    }
    function withViews(int $views)
    {
        $this->views = $views;
        return $this;
    }
}
