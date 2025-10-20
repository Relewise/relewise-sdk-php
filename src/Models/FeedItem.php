<?php declare(strict_types=1);

namespace Relewise\Models;

/** Represents a single item in a feed, which can be either a product (with optional variant) or content. Used to specify items for feed operations such as tracking user interactions via FeedItemPreview, and FeedDwell. */
class FeedItem
{
    /** The product and variant identifier for this feed item. Set this property when the feed item represents a product, either with or without a specific variant. Cannot be set simultaneously with ContentId. */
    public ?ProductAndVariantId $productAndVariantId;
    /** The content identifier for this feed item. Set this property when the feed item represents content. Cannot be set simultaneously with ProductAndVariantId. */
    public ?string $contentId;
    
    /**
     * Initializes a new instance of the FeedItem class with a product and optional variant.
     * @param ProductAndVariantId $productAndVariantId The product and variant identifier for this feed item.
     */
    public static function create(ProductAndVariantId $productAndVariantId) : FeedItem
    {
        $result = new FeedItem();
        $result->productAndVariantId = $productAndVariantId;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedItem
    {
        $result = new FeedItem();
        if (array_key_exists("productAndVariantId", $arr))
        {
            $result->productAndVariantId = ProductAndVariantId::hydrate($arr["productAndVariantId"]);
        }
        if (array_key_exists("contentId", $arr))
        {
            $result->contentId = $arr["contentId"];
        }
        return $result;
    }
    
    /** The product and variant identifier for this feed item. Set this property when the feed item represents a product, either with or without a specific variant. Cannot be set simultaneously with ContentId. */
    function setProductAndVariantId(?ProductAndVariantId $productAndVariantId)
    {
        $this->productAndVariantId = $productAndVariantId;
        return $this;
    }
    
    /** The content identifier for this feed item. Set this property when the feed item represents content. Cannot be set simultaneously with ProductAndVariantId. */
    function setContentId(?string $contentId)
    {
        $this->contentId = $contentId;
        return $this;
    }
}
