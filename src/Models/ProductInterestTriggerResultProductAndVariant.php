<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductInterestTriggerResultProductAndVariant
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.ProductInterestTriggerResult+ProductAndVariant, Relewise.Client";
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
    /**
     * Sets product to a new value.
     * @param ProductResultDetails $product new value.
     */
    function setProduct(ProductResultDetails $product)
    {
        $this->product = $product;
        return $this;
    }
    /**
     * Sets variant to a new value.
     * @param VariantResultDetails $variant new value.
     */
    function setVariant(VariantResultDetails $variant)
    {
        $this->variant = $variant;
        return $this;
    }
    /**
     * Sets views to a new value.
     * @param int $views new value.
     */
    function setViews(int $views)
    {
        $this->views = $views;
        return $this;
    }
}
