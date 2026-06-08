<?php declare(strict_types=1);

namespace Relewise\Models;

/** Configuration for feed sources, which determine the content and products that appear in feeds. This includes enablement, selection policies, and result limits for each source. */
class FeedSourceConfiguration
{
    /** Feed sources that produce product results. */
    public array $products;
    /** Feed sources that produce content results. */
    public array $content;
    
    public static function create() : FeedSourceConfiguration
    {
        $result = new FeedSourceConfiguration();
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedSourceConfiguration
    {
        $result = new FeedSourceConfiguration();
        if (array_key_exists("products", $arr))
        {
            $result->products = array();
            foreach($arr["products"] as &$value)
            {
                array_push($result->products, IProductFeedSource::hydrate($value));
            }
        }
        if (array_key_exists("content", $arr))
        {
            $result->content = array();
            foreach($arr["content"] as &$value)
            {
                array_push($result->content, IContentFeedSource::hydrate($value));
            }
        }
        return $result;
    }
    
    /** Feed sources that produce product results. */
    function setProducts(IProductFeedSource ... $products)
    {
        $this->products = $products;
        return $this;
    }
    
    /**
     * Feed sources that produce product results.
     * @param IProductFeedSource[] $products new value.
     */
    function setProductsFromArray(array $products)
    {
        $this->products = $products;
        return $this;
    }
    
    /** Feed sources that produce product results. */
    function addToProducts(IProductFeedSource $products)
    {
        if (!isset($this->products))
        {
            $this->products = array();
        }
        array_push($this->products, $products);
        return $this;
    }
    
    /** Feed sources that produce content results. */
    function setContent(IContentFeedSource ... $content)
    {
        $this->content = $content;
        return $this;
    }
    
    /**
     * Feed sources that produce content results.
     * @param IContentFeedSource[] $content new value.
     */
    function setContentFromArray(array $content)
    {
        $this->content = $content;
        return $this;
    }
    
    /** Feed sources that produce content results. */
    function addToContent(IContentFeedSource $content)
    {
        if (!isset($this->content))
        {
            $this->content = array();
        }
        array_push($this->content, $content);
        return $this;
    }
}
