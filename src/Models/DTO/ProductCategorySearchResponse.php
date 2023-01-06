<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategorySearchResponse extends PaginatedSearchResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.ProductCategorySearchResponse, Relewise.Client";
    public array $results;
    public ProductCategoryFacetResult $facets;
    public array $recommendations;
    public static function create() : ProductCategorySearchResponse
    {
        $result = new ProductCategorySearchResponse();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategorySearchResponse
    {
        $result = PaginatedSearchResponse::hydrateBase(new ProductCategorySearchResponse(), $arr);
        if (array_key_exists("results", $arr))
        {
            $result->results = array();
            foreach($arr["results"] as &$value)
            {
                array_push($result->results, ProductCategoryResult::hydrate($value));
            }
        }
        if (array_key_exists("facets", $arr))
        {
            $result->facets = ProductCategoryFacetResult::hydrate($arr["facets"]);
        }
        if (array_key_exists("recommendations", $arr))
        {
            $result->recommendations = array();
            foreach($arr["recommendations"] as &$value)
            {
                array_push($result->recommendations, ProductCategoryResult::hydrate($value));
            }
        }
        return $result;
    }
    function setResults(ProductCategoryResult ... $results)
    {
        $this->results = $results;
        return $this;
    }
    function addToResults(ProductCategoryResult $results)
    {
        if (!isset($this->results))
        {
            $this->results = array();
        }
        array_push($this->results, $results);
        return $this;
    }
    function setFacets(ProductCategoryFacetResult $facets)
    {
        $this->facets = $facets;
        return $this;
    }
    function setRecommendations(ProductCategoryResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    function addToRecommendations(ProductCategoryResult $recommendations)
    {
        if (!isset($this->recommendations))
        {
            $this->recommendations = array();
        }
        array_push($this->recommendations, $recommendations);
        return $this;
    }
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
