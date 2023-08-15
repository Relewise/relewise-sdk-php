<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductIndexConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.ProductIndexConfiguration, Relewise.Client";
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
    /**
     * Sets id to a new value.
     * @param FieldIndexConfiguration $id new value.
     */
    function setId(FieldIndexConfiguration $id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Sets displayName to a new value.
     * @param FieldIndexConfiguration $displayName new value.
     */
    function setDisplayName(FieldIndexConfiguration $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Sets category to a new value.
     * @param CategoryIndexConfiguration $category new value.
     */
    function setCategory(CategoryIndexConfiguration $category)
    {
        $this->category = $category;
        return $this;
    }
    /**
     * Sets brand to a new value.
     * @param BrandIndexConfiguration $brand new value.
     */
    function setBrand(BrandIndexConfiguration $brand)
    {
        $this->brand = $brand;
        return $this;
    }
    /**
     * Sets data to a new value.
     * @param DataIndexConfiguration $data new value.
     */
    function setData(DataIndexConfiguration $data)
    {
        $this->data = $data;
        return $this;
    }
    /**
     * Sets variants to a new value.
     * @param VariantIndexConfiguration $variants new value.
     */
    function setVariants(VariantIndexConfiguration $variants)
    {
        $this->variants = $variants;
        return $this;
    }
}
