<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductDetailsCollectionResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ProductDetailsCollectionResponse, Relewise.Client";
    
    public array $products;
    public ?int $totalNumberOfResults;
    /** Provides a token for NextPageToken to consume ProductQuery results in pages of PageSize. Turns null as soon as cursor is fully exhausted/read/processed. Once null is returned, there are no more data to be retrieved and no more requests should be made. */
    public ?string $nextPageToken;
    
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
        if (array_key_exists("nextPageToken", $arr))
        {
            $result->nextPageToken = $arr["nextPageToken"];
        }
        return $result;
    }
    
    function setProducts(ProductResultDetails ... $products)
    {
        $this->products = $products;
        return $this;
    }
    
    /** @param ProductResultDetails[] $products new value. */
    function setProductsFromArray(array $products)
    {
        $this->products = $products;
        return $this;
    }
    
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
    
    /** Provides a token for NextPageToken to consume ProductQuery results in pages of PageSize. Turns null as soon as cursor is fully exhausted/read/processed. Once null is returned, there are no more data to be retrieved and no more requests should be made. */
    function setNextPageToken(?string $nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
        return $this;
    }
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
