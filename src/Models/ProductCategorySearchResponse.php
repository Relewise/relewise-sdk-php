<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets results to a new value.
     * @param ProductCategoryResult[] $results new value.
     */
    function setResults(ProductCategoryResult ... $results)
    {
        $this->results = $results;
        return $this;
    }
    /**
     * Sets results to a new value from an array.
     * @param ProductCategoryResult[] $results new value.
     */
    function setResultsFromArray(array $results)
    {
        $this->results = $results;
        return $this;
    }
    /**
     * Adds a new element to results.
     * @param ProductCategoryResult $results new element.
     */
    function addToResults(ProductCategoryResult $results)
    {
        if (!isset($this->results))
        {
            $this->results = array();
        }
        array_push($this->results, $results);
        return $this;
    }
    /**
     * Sets facets to a new value.
     * @param ProductCategoryFacetResult $facets new value.
     */
    function setFacets(ProductCategoryFacetResult $facets)
    {
        $this->facets = $facets;
        return $this;
    }
    /**
     * Sets recommendations to a new value.
     * @param ProductCategoryResult[] $recommendations new value.
     */
    function setRecommendations(ProductCategoryResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Sets recommendations to a new value from an array.
     * @param ProductCategoryResult[] $recommendations new value.
     */
    function setRecommendationsFromArray(array $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Adds a new element to recommendations.
     * @param ProductCategoryResult $recommendations new element.
     */
    function addToRecommendations(ProductCategoryResult $recommendations)
    {
        if (!isset($this->recommendations))
        {
            $this->recommendations = array();
        }
        array_push($this->recommendations, $recommendations);
        return $this;
    }
    /**
     * Sets hits to a new value.
     * @param int $hits new value.
     */
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    /**
     * Sets statistics to a new value.
     * @param Statistics $statistics new value.
     */
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
