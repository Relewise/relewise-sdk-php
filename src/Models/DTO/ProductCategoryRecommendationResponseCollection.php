<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryRecommendationResponseCollection extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ProductCategoryRecommendationResponseCollection, Relewise.Client";
    public array $responses;
    public static function create(ProductCategoryRecommendationResponse ... $responses) : ProductCategoryRecommendationResponseCollection
    {
        $result = new ProductCategoryRecommendationResponseCollection();
        $result->responses = $responses;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryRecommendationResponseCollection
    {
        $result = TimedResponse::hydrateBase(new ProductCategoryRecommendationResponseCollection(), $arr);
        if (array_key_exists("responses", $arr))
        {
            $result->responses = array();
            foreach($arr["responses"] as &$value)
            {
                array_push($result->responses, ProductCategoryRecommendationResponse::hydrate($value));
            }
        }
        return $result;
    }
    function withResponses(ProductCategoryRecommendationResponse ... $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
