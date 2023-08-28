<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryRecommendationRequestCollection extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ProductCategoryRecommendationRequestCollection, Relewise.Client";
    public array $requests;
    public bool $requireDistinctContentAcrossResults;
    public static function create(bool $requireDistinctContentsAcrossResults, ProductCategoryRecommendationRequest ... $requests) : ProductCategoryRecommendationRequestCollection
    {
        $result = new ProductCategoryRecommendationRequestCollection();
        $result->requireDistinctContentAcrossResults = $requireDistinctContentsAcrossResults;
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
        if (array_key_exists("requireDistinctContentAcrossResults", $arr))
        {
            $result->requireDistinctContentAcrossResults = $arr["requireDistinctContentAcrossResults"];
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
    function setRequireDistinctContentAcrossResults(bool $requireDistinctContentAcrossResults)
    {
        $this->requireDistinctContentAcrossResults = $requireDistinctContentAcrossResults;
        return $this;
    }
}
