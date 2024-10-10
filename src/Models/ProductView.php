<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductView extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductView, Relewise.Client";
    
    public ?User $user;
    public Product $product;
    public ?ProductVariant $variant;
    
    public static function create(?User $user, Product $product, ?ProductVariant $variant = Null) : ProductView
    {
        $result = new ProductView();
        $result->user = $user;
        $result->product = $product;
        $result->variant = $variant;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductView
    {
        $result = Trackable::hydrateBase(new ProductView(), $arr);
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("product", $arr))
        {
            $result->product = Product::hydrate($arr["product"]);
        }
        if (array_key_exists("variant", $arr))
        {
            $result->variant = ProductVariant::hydrate($arr["variant"]);
        }
        return $result;
    }
    
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
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
}
