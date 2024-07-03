<?php declare(strict_types=1);

namespace Relewise\Models;

class LineItem
{
    public Product $product;
    public ?ProductVariant $variant;
    public int $quantity;
    public float $lineTotal;
    public ?array $data;
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
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = DataValue::hydrate($value);
            }
        }
        return $result;
    }
    function setProduct(Product $product)
    {
        $this->product = $product;
        return $this;
    }
    function setVariant(?ProductVariant $variant)
    {
        $this->variant = $variant;
        return $this;
    }
    function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
    function setLineTotal(float $lineTotal)
    {
        $this->lineTotal = $lineTotal;
        return $this;
    }
    function addToData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    /** @param ?array<string, DataValue> $data associative array. */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
}
