<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductRecommendationRequestCollection extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ProductRecommendationRequestCollection, Relewise.Client";
    public array $requests;
    public bool $requireDistinctProductsAcrossResults;
    
    public static function create(bool $requireDistinctProductsAcrossResults, ProductRecommendationRequest ... $requests) : ProductRecommendationRequestCollection
    {
        $result = new ProductRecommendationRequestCollection();
        $result->requireDistinctProductsAcrossResults = $requireDistinctProductsAcrossResults;
        $result->requests = $requests;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductRecommendationRequestCollection
    {
        $result = LicensedRequest::hydrateBase(new ProductRecommendationRequestCollection(), $arr);
        if (array_key_exists("requests", $arr))
        {
            $result->requests = array();
            foreach($arr["requests"] as &$value)
            {
                array_push($result->requests, ProductRecommendationRequest::hydrate($value));
            }
        }
        if (array_key_exists("requireDistinctProductsAcrossResults", $arr))
        {
            $result->requireDistinctProductsAcrossResults = $arr["requireDistinctProductsAcrossResults"];
        }
        return $result;
    }
    
    function setRequests(ProductRecommendationRequest ... $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    
    /** @param ProductRecommendationRequest[] $requests new value. */
    function setRequestsFromArray(array $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    
    function addToRequests(ProductRecommendationRequest $requests)
    {
        if (!isset($this->requests))
        {
            $this->requests = array();
        }
        array_push($this->requests, $requests);
        return $this;
    }
    
    function setRequireDistinctProductsAcrossResults(bool $requireDistinctProductsAcrossResults)
    {
        $this->requireDistinctProductsAcrossResults = $requireDistinctProductsAcrossResults;
        return $this;
    }
}
