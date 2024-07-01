<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryInterestTriggerResultCategoryProductAndVariant
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.ProductCategoryInterestTriggerResult+Category+ProductAndVariant, Relewise.Client";
    public ProductResultDetails $product;
    public VariantResultDetails $variant;
    public static function create() : ProductCategoryInterestTriggerResultCategoryProductAndVariant
    {
        $result = new ProductCategoryInterestTriggerResultCategoryProductAndVariant();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryInterestTriggerResultCategoryProductAndVariant
    {
        $result = new ProductCategoryInterestTriggerResultCategoryProductAndVariant();
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
    function setProduct(ProductResultDetails $product)
    {
        $this->product = $product;
        return $this;
    }
    function setVariant(VariantResultDetails $variant)
    {
        $this->variant = $variant;
        return $this;
    }
}
