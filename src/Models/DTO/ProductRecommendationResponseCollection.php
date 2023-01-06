<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductRecommendationResponseCollection extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ProductRecommendationResponseCollection, Relewise.Client";
    public array $responses;
    public static function create(ProductRecommendationResponse ... $responses) : ProductRecommendationResponseCollection
    {
        $result = new ProductRecommendationResponseCollection();
        $result->responses = $responses;
        return $result;
    }
    public static function hydrate(array $arr) : ProductRecommendationResponseCollection
    {
        $result = TimedResponse::hydrateBase(new ProductRecommendationResponseCollection(), $arr);
        if (array_key_exists("responses", $arr))
        {
            $result->responses = array();
            foreach($arr["responses"] as &$value)
            {
                array_push($result->responses, ProductRecommendationResponse::hydrate($value));
            }
        }
        return $result;
    }
    function withResponses(ProductRecommendationResponse ... $responses)
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
