<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withResults(ProductResult ... $results)
    {
        $this->results = $results;
        return $this;
    }
    function withFacets(ProductFacetResult $facets)
    {
        $this->facets = $facets;
        return $this;
    }
    function withRecommendations(ProductResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    function withRedirects(RedirectResult ... $redirects)
    {
        $this->redirects = $redirects;
        return $this;
    }
    function withHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
