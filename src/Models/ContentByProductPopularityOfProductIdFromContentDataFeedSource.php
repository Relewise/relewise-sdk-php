<?php declare(strict_types=1);

namespace Relewise\Models;

/** Produces content by scoring product popularity for products referenced by product ids on the content items.  Use this feed source to create a dynamic personalized feed that shows content related to popular products and products with which the user has recently interacted. To use this content source, content items must contain ids of the related products (for example, products featured in a video) in data key referenced by ContentDataKey. The output will be ranked by popularity of the referenced products, combined with the user's recent interaction with the products in the feed. */
class ContentByProductPopularityOfProductIdFromContentDataFeedSource extends FeedSource implements IContentFeedSource
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Feed.Sources.ContentByProductPopularityOfProductIdFromContentDataFeedSource, Relewise.Client";
    /** The content data key that contains related product ids. */
    public string $contentDataKey;
    /** The popularity window in minutes used for the referenced product ids. */
    public int $productPopularityWindowMinutes;
    /** The popularity dimension used when scoring referenced product ids, such as most viewed vs. most purchased. */
    public PopularityTypes $productPopularityDimension;
    /** Aggregation strategy used when combining popularity scores. */
    public ProductPopularityScoreAggregation $aggregation;
    /** Defines how many most-popular content items are considered for the feed. */
    public int $contentPopularityThreshold;
    /** Defines how many product ids are read from each content item. */
    public int $maxProductIdsPerContent;
    /** Controls how much local randomization is applied after ranking by referenced product popularity. */
    public int $randomizationWindow;
    
    public static function create(FeedSourceSelectionPolicy $selectionPolicy, string $contentDataKey, int $productPopularityWindowMinutes, PopularityTypes $productPopularityDimension, ProductPopularityScoreAggregation $aggregation, int $contentPopularityThreshold, int $maxProductIdsPerContent, int $randomizationWindow) : ContentByProductPopularityOfProductIdFromContentDataFeedSource
    {
        $result = new ContentByProductPopularityOfProductIdFromContentDataFeedSource();
        $result->selectionPolicy = $selectionPolicy;
        $result->contentDataKey = $contentDataKey;
        $result->productPopularityWindowMinutes = $productPopularityWindowMinutes;
        $result->productPopularityDimension = $productPopularityDimension;
        $result->aggregation = $aggregation;
        $result->contentPopularityThreshold = $contentPopularityThreshold;
        $result->maxProductIdsPerContent = $maxProductIdsPerContent;
        $result->randomizationWindow = $randomizationWindow;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentByProductPopularityOfProductIdFromContentDataFeedSource
    {
        $result = FeedSource::hydrateBase(new ContentByProductPopularityOfProductIdFromContentDataFeedSource(), $arr);
        if (array_key_exists("contentDataKey", $arr))
        {
            $result->contentDataKey = $arr["contentDataKey"];
        }
        if (array_key_exists("productPopularityWindowMinutes", $arr))
        {
            $result->productPopularityWindowMinutes = $arr["productPopularityWindowMinutes"];
        }
        if (array_key_exists("productPopularityDimension", $arr))
        {
            $result->productPopularityDimension = PopularityTypes::from($arr["productPopularityDimension"]);
        }
        if (array_key_exists("aggregation", $arr))
        {
            $result->aggregation = ProductPopularityScoreAggregation::from($arr["aggregation"]);
        }
        if (array_key_exists("contentPopularityThreshold", $arr))
        {
            $result->contentPopularityThreshold = $arr["contentPopularityThreshold"];
        }
        if (array_key_exists("maxProductIdsPerContent", $arr))
        {
            $result->maxProductIdsPerContent = $arr["maxProductIdsPerContent"];
        }
        if (array_key_exists("randomizationWindow", $arr))
        {
            $result->randomizationWindow = $arr["randomizationWindow"];
        }
        return $result;
    }
    
    /** The content data key that contains related product ids. */
    function setContentDataKey(string $contentDataKey)
    {
        $this->contentDataKey = $contentDataKey;
        return $this;
    }
    
    /** The popularity window in minutes used for the referenced product ids. */
    function setProductPopularityWindowMinutes(int $productPopularityWindowMinutes)
    {
        $this->productPopularityWindowMinutes = $productPopularityWindowMinutes;
        return $this;
    }
    
    /** The popularity dimension used when scoring referenced product ids, such as most viewed vs. most purchased. */
    function setProductPopularityDimension(PopularityTypes $productPopularityDimension)
    {
        $this->productPopularityDimension = $productPopularityDimension;
        return $this;
    }
    
    /** Aggregation strategy used when combining popularity scores. */
    function setAggregation(ProductPopularityScoreAggregation $aggregation)
    {
        $this->aggregation = $aggregation;
        return $this;
    }
    
    /** Defines how many most-popular content items are considered for the feed. */
    function setContentPopularityThreshold(int $contentPopularityThreshold)
    {
        $this->contentPopularityThreshold = $contentPopularityThreshold;
        return $this;
    }
    
    /** Defines how many product ids are read from each content item. */
    function setMaxProductIdsPerContent(int $maxProductIdsPerContent)
    {
        $this->maxProductIdsPerContent = $maxProductIdsPerContent;
        return $this;
    }
    
    /** Controls how much local randomization is applied after ranking by referenced product popularity. */
    function setRandomizationWindow(int $randomizationWindow)
    {
        $this->randomizationWindow = $randomizationWindow;
        return $this;
    }
    
    function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    
    function setSelectionPolicy(FeedSourceSelectionPolicy $selectionPolicy)
    {
        $this->selectionPolicy = $selectionPolicy;
        return $this;
    }
    
    function setMaxResults(?int $maxResults)
    {
        $this->maxResults = $maxResults;
        return $this;
    }
    
    function setMaxResultsPerChanceGiven(?int $maxResultsPerChanceGiven)
    {
        $this->maxResultsPerChanceGiven = $maxResultsPerChanceGiven;
        return $this;
    }
}
