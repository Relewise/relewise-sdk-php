<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryDetailsCollectionResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ProductCategoryDetailsCollectionResponse, Relewise.Client";
    public array $categories;
    public ?int $totalNumberOfResults;
    public static function create(array $categories, ?int $totalNumberOfResults) : ProductCategoryDetailsCollectionResponse
    {
        $result = new ProductCategoryDetailsCollectionResponse();
        $result->categories = $categories;
        $result->totalNumberOfResults = $totalNumberOfResults;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDetailsCollectionResponse
    {
        $result = TimedResponse::hydrateBase(new ProductCategoryDetailsCollectionResponse(), $arr);
        if (array_key_exists("categories", $arr))
        {
            $result->categories = array();
            foreach($arr["categories"] as &$value)
            {
                array_push($result->categories, ProductCategoryResultDetails::hydrate($value));
            }
        }
        if (array_key_exists("totalNumberOfResults", $arr))
        {
            $result->totalNumberOfResults = $arr["totalNumberOfResults"];
        }
        return $result;
    }
    function withCategories(ProductCategoryResultDetails ... $categories)
    {
        $this->categories = $categories;
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
