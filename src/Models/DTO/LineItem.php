<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class LineItem
{
    public Product $product;
    public ?ProductVariant $variant;
    public ?array $custom;
    public int $quantity;
    public float $lineTotal;
    public static function create() : LineItem
    {
        $result = new LineItem();
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
        if (array_key_exists("custom", $arr))
        {
            $result->custom = array();
            foreach($arr["custom"] as $key => $value)
            {
                $result->custom[$key] = $value;
            }
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
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
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
