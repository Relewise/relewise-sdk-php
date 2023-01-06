<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class LineItem
{
    public Product $product;
    public ?ProductVariant $variant;
    public int $quantity;
    public float $lineTotal;
    public static function create(Product $product, ?ProductVariant $variant, int $quantity, float $lineTotal) : LineItem
    {
        $result = new LineItem();
        $result->product = $product;
        $result->variant = $variant;
        $result->quantity = $quantity;
        $result->lineTotal = $lineTotal;
        return $result;
    }
    public static function hydrate(array $arr) : LineItem
    {
        $result = new LineItem();
        if (array_key_exists("product", $arr))
        {
            $result->product = Product::hydrate($arr["product"]);
        }
        if (array_key_exists("variant", $arr))
        {
            $result->variant = ProductVariant::hydrate($arr["variant"]);
        }
        if (array_key_exists("quantity", $arr))
        {
            $result->quantity = $arr["quantity"];
        }
        if (array_key_exists("lineTotal", $arr))
        {
            $result->lineTotal = $arr["lineTotal"];
        }
        return $result;
    }
    function withProduct(Product $product)
    {
        $this->product = $product;
        return $this;
    }
    function withVariant(?ProductVariant $variant)
    {
        $this->variant = $variant;
        return $this;
    }
    function withQuantity(int $quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
    function withLineTotal(float $lineTotal)
    {
        $this->lineTotal = $lineTotal;
        return $this;
    }
}
