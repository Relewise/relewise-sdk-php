<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductSearchResponse extends PaginatedSearchResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.ProductSearchResponse, Relewise.Client";
    public array $results;
    public ProductFacetResult $facets;
    public array $recommendations;
    public array $redirects;
    public static function create() : ProductSearchResponse
    {
        $result = new ProductSearchResponse();
        return $result;
    }
    public static function hydrate(array $arr) : ProductSearchResponse
    {
        $result = PaginatedSearchResponse::hydrateBase(new ProductSearchResponse(), $arr);
        if (array_key_exists("results", $arr))
        {
            $result->results = array();
            foreach($arr["results"] as &$value)
            {
                array_push($result->results, ProductResult::hydrate($value));
            }
        }
        if (array_key_exists("facets", $arr))
        {
            $result->facets = ProductFacetResult::hydrate($arr["facets"]);
        }
        if (array_key_exists("recommendations", $arr))
        {
            $result->recommendations = array();
            foreach($arr["recommendations"] as &$value)
            {
                array_push($result->recommendations, ProductResult::hydrate($value));
            }
        }
        if (array_key_exists("redirects", $arr))
        {
            $result->redirects = array();
            foreach($arr["redirects"] as &$value)
            {
                array_push($result->redirects, RedirectResult::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets results to a new value.
     * @param ProductResult[] $results new value.
     */
    function setResults(ProductResult ... $results)
    {
        $this->results = $results;
        return $this;
    }
    /**
     * Sets results to a new value from an array.
     * @param ProductResult[] $results new value.
     */
    function setResultsFromArray(array $results)
    {
        $this->results = $results;
        return $this;
    }
    /**
     * Adds a new element to results.
     * @param ProductResult $results new element.
     */
    function addToResults(ProductResult $results)
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
     * @param ProductFacetResult $facets new value.
     */
    function setFacets(ProductFacetResult $facets)
    {
        $this->facets = $facets;
        return $this;
    }
    /**
     * Sets recommendations to a new value.
     * @param ProductResult[] $recommendations new value.
     */
    function setRecommendations(ProductResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Sets recommendations to a new value from an array.
     * @param ProductResult[] $recommendations new value.
     */
    function setRecommendationsFromArray(array $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Adds a new element to recommendations.
     * @param ProductResult $recommendations new element.
     */
    function addToRecommendations(ProductResult $recommendations)
    {
        if (!isset($this->recommendations))
        {
            $this->recommendations = array();
        }
        array_push($this->recommendations, $recommendations);
        return $this;
    }
    /**
     * Sets redirects to a new value.
     * @param RedirectResult[] $redirects new value.
     */
    function setRedirects(RedirectResult ... $redirects)
    {
        $this->redirects = $redirects;
        return $this;
    }
    /**
     * Sets redirects to a new value from an array.
     * @param RedirectResult[] $redirects new value.
     */
    function setRedirectsFromArray(array $redirects)
    {
        $this->redirects = $redirects;
        return $this;
    }
    /**
     * Adds a new element to redirects.
     * @param RedirectResult $redirects new element.
     */
    function addToRedirects(RedirectResult $redirects)
    {
        if (!isset($this->redirects))
        {
            $this->redirects = array();
        }
        array_push($this->redirects, $redirects);
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
