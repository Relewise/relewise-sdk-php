<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withProducts(ProductResultDetails ... $products)
    {
        $this->products = $products;
        return $this;
    }
    function withTotalNumberOfResults(?int $totalNumberOfResults)
    {
        $this->totalNumberOfResults = $totalNumberOfResults;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
