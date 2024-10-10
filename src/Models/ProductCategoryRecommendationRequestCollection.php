<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryRecommendationRequestCollection extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ProductCategoryRecommendationRequestCollection, Relewise.Client";
    
    public array $requests;
    public bool $requireDistinctCategoriesAcrossResults;
    public static function create(bool $requireDistinctCategoriesesAcrossResults, ProductCategoryRecommendationRequest ... $requests) : ProductCategoryRecommendationRequestCollection
    {
        $result = new ProductCategoryRecommendationRequestCollection();
        $result->requireDistinctCategoriesAcrossResults = $requireDistinctCategoriesesAcrossResults;
        $result->requests = $requests;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductCategoryRecommendationRequestCollection
    {
        $result = LicensedRequest::hydrateBase(new ProductCategoryRecommendationRequestCollection(), $arr);
        if (array_key_exists("requests", $arr))
        {
            $result->requests = array();
            foreach($arr["requests"] as &$value)
            {
                array_push($result->requests, ProductCategoryRecommendationRequest::hydrate($value));
            }
        }
        if (array_key_exists("requireDistinctCategoriesAcrossResults", $arr))
        {
            $result->requireDistinctCategoriesAcrossResults = $arr["requireDistinctCategoriesAcrossResults"];
        }
        return $result;
    }
    
    function setRequests(ProductCategoryRecommendationRequest ... $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    
    /** @param ProductCategoryRecommendationRequest[] $requests new value. */
    function setRequestsFromArray(array $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    
    function addToRequests(ProductCategoryRecommendationRequest $requests)
    {
        if (!isset($this->requests))
        {
            $this->requests = array();
        }
        array_push($this->requests, $requests);
        return $this;
    }
    
    function setRequireDistinctCategoriesAcrossResults(bool $requireDistinctCategoriesAcrossResults)
    {
        $this->requireDistinctCategoriesAcrossResults = $requireDistinctCategoriesAcrossResults;
        return $this;
    }
}
