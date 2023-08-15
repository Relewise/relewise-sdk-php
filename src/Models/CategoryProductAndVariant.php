<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class CategoryProductAndVariant
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.ProductCategoryInterestTriggerResult+Category+ProductAndVariant, Relewise.Client";
    public ProductResultDetails $product;
    public VariantResultDetails $variant;
    public static function create() : CategoryProductAndVariant
    {
        $result = new CategoryProductAndVariant();
        return $result;
    }
    public static function hydrate(array $arr) : CategoryProductAndVariant
    {
        $result = new CategoryProductAndVariant();
        if (array_key_exists("product", $arr))
        {
            $result->product = ProductResultDetails::hydrate($arr["product"]);
        }
        if (array_key_exists("variant", $arr))
        {
            $result->variant = VariantResultDetails::hydrate($arr["variant"]);
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
}
