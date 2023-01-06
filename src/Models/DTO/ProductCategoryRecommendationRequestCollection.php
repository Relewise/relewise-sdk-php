<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withRequests(ProductCategoryRecommendationRequest ... $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    function withRequireDistinctContentAcrossResults(bool $requireDistinctContentAcrossResults)
    {
        $this->requireDistinctContentAcrossResults = $requireDistinctContentAcrossResults;
        return $this;
    }
}
