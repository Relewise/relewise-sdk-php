<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductDetailsCollectionResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ProductDetailsCollectionResponse, Relewise.Client";
    public array $products;
    public ?int $totalNumberOfResults;
    public static function create(array $products, ?int $totalNumberOfResults) : ProductDetailsCollectionResponse
    {
        $result = new ProductDetailsCollectionResponse();
        $result->products = $products;
        $result->totalNumberOfResults = $totalNumberOfResults;
        return $result;
    }
    public static function hydrate(array $arr) : ProductDetailsCollectionResponse
    {
        $result = TimedResponse::hydrateBase(new ProductDetailsCollectionResponse(), $arr);
        if (array_key_exists("products", $arr))
        {
            $result->products = array();
            foreach($arr["products"] as &$value)
            {
                array_push($result->products, ProductResultDetails::hydrate($value));
            }
        }
        if (array_key_exists("totalNumberOfResults", $arr))
        {
            $result->totalNumberOfResults = $arr["totalNumberOfResults"];
        }
        return $result;
    }
    function setProducts(ProductResultDetails ... $products)
    {
        $this->products = $products;
        return $this;
    }
    /**
     * Sets products to a new value from an array.
     * @param ProductResultDetails[] $products new value.
     */
    function setProductsFromArray(array $products)
    {
        $this->products = $products;
        return $this;
    }
    /**
     * Adds a new element to products.
     * @param ProductResultDetails $products new element.
     */
    function addToProducts(ProductResultDetails $products)
    {
        if (!isset($this->products))
        {
            $this->products = array();
        }
        array_push($this->products, $products);
        return $this;
    }
    function setTotalNumberOfResults(?int $totalNumberOfResults)
    {
        $this->totalNumberOfResults = $totalNumberOfResults;
        return $this;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
