<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductIndexConfiguration
{
    public FieldIndexConfiguration $id;
    public FieldIndexConfiguration $displayName;
    public CategoryIndexConfiguration $category;
    public BrandIndexConfiguration $brand;
    public DataIndexConfiguration $data;
    public VariantIndexConfiguration $variants;
    public static function create() : ProductIndexConfiguration
    {
        $result = new ProductIndexConfiguration();
        return $result;
    }
    public static function hydrate(array $arr) : ProductIndexConfiguration
    {
        $result = new ProductIndexConfiguration();
        if (array_key_exists("id", $arr))
        {
            $result->id = FieldIndexConfiguration::hydrate($arr["id"]);
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = FieldIndexConfiguration::hydrate($arr["displayName"]);
        }
        if (array_key_exists("category", $arr))
        {
            $result->category = CategoryIndexConfiguration::hydrate($arr["category"]);
        }
        if (array_key_exists("brand", $arr))
        {
            $result->brand = BrandIndexConfiguration::hydrate($arr["brand"]);
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = DataIndexConfiguration::hydrate($arr["data"]);
        }
        if (array_key_exists("variants", $arr))
        {
            $result->variants = VariantIndexConfiguration::hydrate($arr["variants"]);
        }
        return $result;
    }
    function withId(FieldIndexConfiguration $id)
    {
        $this->id = $id;
        return $this;
    }
    function withDisplayName(FieldIndexConfiguration $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function withCategory(CategoryIndexConfiguration $category)
    {
        $this->category = $category;
        return $this;
    }
    function withBrand(BrandIndexConfiguration $brand)
    {
        $this->brand = $brand;
        return $this;
    }
    function withData(DataIndexConfiguration $data)
    {
        $this->data = $data;
        return $this;
    }
    function withVariants(VariantIndexConfiguration $variants)
    {
        $this->variants = $variants;
        return $this;
    }
}
