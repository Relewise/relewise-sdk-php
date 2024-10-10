<?php declare(strict_types=1);

namespace Relewise\Models;

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
    
    function setCategories(ProductCategoryResultDetails ... $categories)
    {
        $this->categories = $categories;
        return $this;
    }
    
    /** @param ProductCategoryResultDetails[] $categories new value. */
    function setCategoriesFromArray(array $categories)
    {
        $this->categories = $categories;
        return $this;
    }
    
    function addToCategories(ProductCategoryResultDetails $categories)
    {
        if (!isset($this->categories))
        {
            $this->categories = array();
        }
        array_push($this->categories, $categories);
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
