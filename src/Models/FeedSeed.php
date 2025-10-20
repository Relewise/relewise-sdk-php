<?php declare(strict_types=1);

namespace Relewise\Models;

/** Defines the settings for seeding the feed with specific products or content. Useful, for example, when you want to show a feed based on specific product(s) or content, such as for a feed on a PDP/CDP, a shopping cart, or an order. */
class FeedSeed
{
    /** Optionally used to seed the feed with specific product IDs (optionally also with variant IDs), e.g., a single product for a PDP or one to many products for a shopping cart or order. */
    public ?array $productAndVariantIds;
    /** Optionally used to seed the feed with specific content, e.g., a single content ID for a CDP. */
    public ?array $contentIds;
    
    public static function create() : FeedSeed
    {
        $result = new FeedSeed();
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedSeed
    {
        $result = new FeedSeed();
        if (array_key_exists("productAndVariantIds", $arr))
        {
            $result->productAndVariantIds = array();
            foreach($arr["productAndVariantIds"] as &$value)
            {
                array_push($result->productAndVariantIds, ProductAndVariantId::hydrate($value));
            }
        }
        if (array_key_exists("contentIds", $arr))
        {
            $result->contentIds = array();
            foreach($arr["contentIds"] as &$value)
            {
                array_push($result->contentIds, $value);
            }
        }
        return $result;
    }
    
    /** Optionally used to seed the feed with specific product IDs (optionally also with variant IDs), e.g., a single product for a PDP or one to many products for a shopping cart or order. */
    function setProductAndVariantIds(ProductAndVariantId ... $productAndVariantIds)
    {
        $this->productAndVariantIds = $productAndVariantIds;
        return $this;
    }
    
    /**
     * Optionally used to seed the feed with specific product IDs (optionally also with variant IDs), e.g., a single product for a PDP or one to many products for a shopping cart or order.
     * @param ?ProductAndVariantId[] $productAndVariantIds new value.
     */
    function setProductAndVariantIdsFromArray(array $productAndVariantIds)
    {
        $this->productAndVariantIds = $productAndVariantIds;
        return $this;
    }
    
    /** Optionally used to seed the feed with specific product IDs (optionally also with variant IDs), e.g., a single product for a PDP or one to many products for a shopping cart or order. */
    function addToProductAndVariantIds(ProductAndVariantId $productAndVariantIds)
    {
        if (!isset($this->productAndVariantIds))
        {
            $this->productAndVariantIds = array();
        }
        array_push($this->productAndVariantIds, $productAndVariantIds);
        return $this;
    }
    
    /** Optionally used to seed the feed with specific content, e.g., a single content ID for a CDP. */
    function setContentIds(string ... $contentIds)
    {
        $this->contentIds = $contentIds;
        return $this;
    }
    
    /**
     * Optionally used to seed the feed with specific content, e.g., a single content ID for a CDP.
     * @param ?string[] $contentIds new value.
     */
    function setContentIdsFromArray(array $contentIds)
    {
        $this->contentIds = $contentIds;
        return $this;
    }
    
    /** Optionally used to seed the feed with specific content, e.g., a single content ID for a CDP. */
    function addToContentIds(string $contentIds)
    {
        if (!isset($this->contentIds))
        {
            $this->contentIds = array();
        }
        array_push($this->contentIds, $contentIds);
        return $this;
    }
}
