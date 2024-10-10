<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductSearchResponse extends PaginatedSearchResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.ProductSearchResponse, Relewise.Client";
    
    public array $results;
    
    public ProductFacetResult $facets;
    
    public array $recommendations;
    
    public array $redirects;
    
    public RetailMediaResult $retailMedia;
    
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
        if (array_key_exists("retailMedia", $arr))
        {
            $result->retailMedia = RetailMediaResult::hydrate($arr["retailMedia"]);
        }
        return $result;
    }
    
    function setResults(ProductResult ... $results)
    {
        $this->results = $results;
        return $this;
    }
    
    /** @param ProductResult[] $results new value. */
    function setResultsFromArray(array $results)
    {
        $this->results = $results;
        return $this;
    }
    
    function addToResults(ProductResult $results)
    {
        if (!isset($this->results))
        {
            $this->results = array();
        }
        array_push($this->results, $results);
        return $this;
    }
    
    function setFacets(ProductFacetResult $facets)
    {
        $this->facets = $facets;
        return $this;
    }
    
    function setRecommendations(ProductResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    
    /** @param ProductResult[] $recommendations new value. */
    function setRecommendationsFromArray(array $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    
    function addToRecommendations(ProductResult $recommendations)
    {
        if (!isset($this->recommendations))
        {
            $this->recommendations = array();
        }
        array_push($this->recommendations, $recommendations);
        return $this;
    }
    
    function setRedirects(RedirectResult ... $redirects)
    {
        $this->redirects = $redirects;
        return $this;
    }
    
    /** @param RedirectResult[] $redirects new value. */
    function setRedirectsFromArray(array $redirects)
    {
        $this->redirects = $redirects;
        return $this;
    }
    
    function addToRedirects(RedirectResult $redirects)
    {
        if (!isset($this->redirects))
        {
            $this->redirects = array();
        }
        array_push($this->redirects, $redirects);
        return $this;
    }
    
    function setRetailMedia(RetailMediaResult $retailMedia)
    {
        $this->retailMedia = $retailMedia;
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
