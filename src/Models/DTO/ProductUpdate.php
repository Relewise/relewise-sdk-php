<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
            $result->brandUpdateKind = $arr["brandUpdateKind"];
        }
        return $result;
    }
    function withProduct(Product $product)
    {
        $this->product = $product;
        return $this;
    }
    function withVariants(ProductVariant ... $variants)
    {
        $this->variants = $variants;
        return $this;
    }
    function withProductUpdateKind(ProductUpdateUpdateKind $productUpdateKind)
    {
        $this->productUpdateKind = $productUpdateKind;
        return $this;
    }
    function withVariantUpdateKind(ProductUpdateUpdateKind $variantUpdateKind)
    {
        $this->variantUpdateKind = $variantUpdateKind;
        return $this;
    }
    function withReplaceExistingVariants(bool $replaceExistingVariants)
    {
        $this->replaceExistingVariants = $replaceExistingVariants;
        return $this;
    }
    function withBrandUpdateKind(?BrandUpdateUpdateKind $brandUpdateKind)
    {
        $this->brandUpdateKind = $brandUpdateKind;
        return $this;
    }
}
