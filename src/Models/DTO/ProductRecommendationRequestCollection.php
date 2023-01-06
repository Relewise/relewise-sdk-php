<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

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
    function withRequests(ProductRecommendationRequest ... $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    function withRequireDistinctProductsAcrossResults(bool $requireDistinctProductsAcrossResults)
    {
        $this->requireDistinctProductsAcrossResults = $requireDistinctProductsAcrossResults;
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
}
