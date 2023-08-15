<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductUpdate extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductUpdate, Relewise.Client";
    public Product $product;
    public array $variants;
    public ProductUpdateUpdateKind $productUpdateKind;
    public ProductUpdateUpdateKind $variantUpdateKind;
    public bool $replaceExistingVariants;
    public ?BrandUpdateUpdateKind $brandUpdateKind;
    public static function create(Product $product, ProductUpdateUpdateKind $productUpdateKind = ProductUpdateUpdateKind::UpdateAndAppend) : ProductUpdate
    {
        $result = new ProductUpdate();
        $result->product = $product;
        $result->productUpdateKind = $productUpdateKind;
        $result->variantUpdateKind = ProductUpdateUpdateKind::UpdateAndAppend;
        $result->replaceExistingVariants = false;
        return $result;
    }
    public static function hydrate(array $arr) : ProductUpdate
    {
        $result = Trackable::hydrateBase(new ProductUpdate(), $arr);
        if (array_key_exists("product", $arr))
        {
            $result->product = Product::hydrate($arr["product"]);
        }
        if (array_key_exists("variants", $arr))
        {
            $result->variants = array();
            foreach($arr["variants"] as &$value)
            {
                array_push($result->variants, ProductVariant::hydrate($value));
            }
        }
        if (array_key_exists("productUpdateKind", $arr))
        {
            $result->productUpdateKind = ProductUpdateUpdateKind::from($arr["productUpdateKind"]);
        }
        if (array_key_exists("variantUpdateKind", $arr))
        {
            $result->variantUpdateKind = ProductUpdateUpdateKind::from($arr["variantUpdateKind"]);
        }
        if (array_key_exists("replaceExistingVariants", $arr))
        {
            $result->replaceExistingVariants = $arr["replaceExistingVariants"];
        }
        if (array_key_exists("brandUpdateKind", $arr))
        {
            $result->brandUpdateKind = BrandUpdateUpdateKind::from($arr["brandUpdateKind"]);
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
     * Sets variants to a new value.
     * @param ProductVariant[] $variants new value.
     */
    function setVariants(ProductVariant ... $variants)
    {
        $this->variants = $variants;
        return $this;
    }
    /**
     * Sets variants to a new value from an array.
     * @param ProductVariant[] $variants new value.
     */
    function setVariantsFromArray(array $variants)
    {
        $this->variants = $variants;
        return $this;
    }
    /**
     * Adds a new element to variants.
     * @param ProductVariant $variants new element.
     */
    function addToVariants(ProductVariant $variants)
    {
        if (!isset($this->variants))
        {
            $this->variants = array();
        }
        array_push($this->variants, $variants);
        return $this;
    }
    /**
     * Sets productUpdateKind to a new value.
     * @param ProductUpdateUpdateKind $productUpdateKind new value.
     */
    function setProductUpdateKind(ProductUpdateUpdateKind $productUpdateKind)
    {
        $this->productUpdateKind = $productUpdateKind;
        return $this;
    }
    /**
     * Sets variantUpdateKind to a new value.
     * @param ProductUpdateUpdateKind $variantUpdateKind new value.
     */
    function setVariantUpdateKind(ProductUpdateUpdateKind $variantUpdateKind)
    {
        $this->variantUpdateKind = $variantUpdateKind;
        return $this;
    }
    /**
     * Sets replaceExistingVariants to a new value.
     * @param bool $replaceExistingVariants new value.
     */
    function setReplaceExistingVariants(bool $replaceExistingVariants)
    {
        $this->replaceExistingVariants = $replaceExistingVariants;
        return $this;
    }
    /**
     * Sets brandUpdateKind to a new value.
     * @param ?BrandUpdateUpdateKind $brandUpdateKind new value.
     */
    function setBrandUpdateKind(?BrandUpdateUpdateKind $brandUpdateKind)
    {
        $this->brandUpdateKind = $brandUpdateKind;
        return $this;
    }
}
