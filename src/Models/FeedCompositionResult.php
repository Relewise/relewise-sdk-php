<?php declare(strict_types=1);

namespace Relewise\Models;

class FeedCompositionResult
{
    /** The name of the configured Name if specified, otherwise null. */
    public ?string $name;
    /** If this composition is of type Product, contains any product results, otherwise null. */
    public ?array $products;
    /** If this composition is of type Content, contains any content results, otherwise null. */
    public ?array $content;
    
    public static function create(?string $name, ?array $products, ContentResult ... $content) : FeedCompositionResult
    {
        $result = new FeedCompositionResult();
        $result->name = $name;
        $result->products = $products;
        $result->content = $content;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedCompositionResult
    {
        $result = new FeedCompositionResult();
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("products", $arr))
        {
            $result->products = array();
            foreach($arr["products"] as &$value)
            {
                array_push($result->products, ProductResult::hydrate($value));
            }
        }
        if (array_key_exists("content", $arr))
        {
            $result->content = array();
            foreach($arr["content"] as &$value)
            {
                array_push($result->content, ContentResult::hydrate($value));
            }
        }
        return $result;
    }
    
    /** The name of the configured Name if specified, otherwise null. */
    function setName(?string $name)
    {
        $this->name = $name;
        return $this;
    }
    
    /** If this composition is of type Product, contains any product results, otherwise null. */
    function setProducts(ProductResult ... $products)
    {
        $this->products = $products;
        return $this;
    }
    
    /**
     * If this composition is of type Product, contains any product results, otherwise null.
     * @param ?ProductResult[] $products new value.
     */
    function setProductsFromArray(array $products)
    {
        $this->products = $products;
        return $this;
    }
    
    /** If this composition is of type Product, contains any product results, otherwise null. */
    function addToProducts(ProductResult $products)
    {
        if (!isset($this->products))
        {
            $this->products = array();
        }
        array_push($this->products, $products);
        return $this;
    }
    
    /** If this composition is of type Content, contains any content results, otherwise null. */
    function setContent(ContentResult ... $content)
    {
        $this->content = $content;
        return $this;
    }
    
    /**
     * If this composition is of type Content, contains any content results, otherwise null.
     * @param ?ContentResult[] $content new value.
     */
    function setContentFromArray(array $content)
    {
        $this->content = $content;
        return $this;
    }
    
    /** If this composition is of type Content, contains any content results, otherwise null. */
    function addToContent(ContentResult $content)
    {
        if (!isset($this->content))
        {
            $this->content = array();
        }
        array_push($this->content, $content);
        return $this;
    }
}
