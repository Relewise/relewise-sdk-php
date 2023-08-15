<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
    /**
     * Sets user to a new value.
     * @param ?User $user new value.
     */
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
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
}
