<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class LineItem
{
    public string $typeDefinition = "Relewise.Client.DataTypes.LineItem, Relewise.Client";
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
    /**
     * Sets product to a new value.
     * @param Product $product new value.
     */
    function setProduct(Product $product)
    {
        $this->product = $product;
        return $this;
    }
    /**
     * Sets variant to a new value.
     * @param ?ProductVariant $variant new value.
     */
    function setVariant(?ProductVariant $variant)
    {
        $this->variant = $variant;
        return $this;
    }
    /**
     * Sets quantity to a new value.
     * @param int $quantity new value.
     */
    function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
    /**
     * Sets lineTotal to a new value.
     * @param float $lineTotal new value.
     */
    function setLineTotal(float $lineTotal)
    {
        $this->lineTotal = $lineTotal;
        return $this;
    }
}
