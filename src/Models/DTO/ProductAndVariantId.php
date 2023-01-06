<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductAndVariantId
{
    public string $productId;
    public ?string $variantId;
    public static function create(string $productId, ?string $variantId = Null) : ProductAndVariantId
    {
        $result = new ProductAndVariantId();
        $result->productId = $productId;
        $result->variantId = $variantId;
        return $result;
    }
    public static function hydrate(array $arr) : ProductAndVariantId
    {
        $result = new ProductAndVariantId();
        if (array_key_exists("productId", $arr))
        {
            $result->productId = $arr["productId"];
        }
        if (array_key_exists("variantId", $arr))
        {
            $result->variantId = $arr["variantId"];
        }
        return $result;
    }
    function withProductId(string $productId)
    {
        $this->productId = $productId;
        return $this;
    }
    function withVariantId(?string $variantId)
    {
        $this->variantId = $variantId;
        return $this;
    }
}
