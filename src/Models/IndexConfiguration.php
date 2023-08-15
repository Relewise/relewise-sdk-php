<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class IndexConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.IndexConfiguration, Relewise.Client";
    public LanguageIndexConfiguration $language;
    public ProductIndexConfiguration $product;
    public ContentIndexConfiguration $content;
    public ProductCategoryIndexConfiguration $productCategory;
    public static function create() : IndexConfiguration
    {
        $result = new IndexConfiguration();
        return $result;
    }
    public static function hydrate(array $arr) : IndexConfiguration
    {
        $result = new IndexConfiguration();
        if (array_key_exists("language", $arr))
        {
            $result->language = LanguageIndexConfiguration::hydrate($arr["language"]);
        }
        if (array_key_exists("product", $arr))
        {
            $result->product = ProductIndexConfiguration::hydrate($arr["product"]);
        }
        if (array_key_exists("content", $arr))
        {
            $result->content = ContentIndexConfiguration::hydrate($arr["content"]);
        }
        if (array_key_exists("productCategory", $arr))
        {
            $result->productCategory = ProductCategoryIndexConfiguration::hydrate($arr["productCategory"]);
        }
        return $result;
    }
    /**
     * Sets language to a new value.
     * @param LanguageIndexConfiguration $language new value.
     */
    function setLanguage(LanguageIndexConfiguration $language)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * Sets product to a new value.
     * @param ProductIndexConfiguration $product new value.
     */
    function setProduct(ProductIndexConfiguration $product)
    {
        $this->product = $product;
        return $this;
    }
    /**
     * Sets content to a new value.
     * @param ContentIndexConfiguration $content new value.
     */
    function setContent(ContentIndexConfiguration $content)
    {
        $this->content = $content;
        return $this;
    }
    /**
     * Sets productCategory to a new value.
     * @param ProductCategoryIndexConfiguration $productCategory new value.
     */
    function setProductCategory(ProductCategoryIndexConfiguration $productCategory)
    {
        $this->productCategory = $productCategory;
        return $this;
    }
}
