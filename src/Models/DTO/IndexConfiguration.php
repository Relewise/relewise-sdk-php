<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class IndexConfiguration
{
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
    function withLanguage(LanguageIndexConfiguration $language)
    {
        $this->language = $language;
        return $this;
    }
    function withProduct(ProductIndexConfiguration $product)
    {
        $this->product = $product;
        return $this;
    }
    function withContent(ContentIndexConfiguration $content)
    {
        $this->content = $content;
        return $this;
    }
    function withProductCategory(ProductCategoryIndexConfiguration $productCategory)
    {
        $this->productCategory = $productCategory;
        return $this;
    }
}
