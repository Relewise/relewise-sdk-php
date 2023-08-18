<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class RecommendationResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.RecommendationResponse, Relewise.Client";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.BrandRecommendationResponse, Relewise.Client")
        {
            return BrandRecommendationResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ContentCategoryRecommendationResponse, Relewise.Client")
        {
            return ContentCategoryRecommendationResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ContentRecommendationResponse, Relewise.Client")
        {
            return ContentRecommendationResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ProductCategoryRecommendationResponse, Relewise.Client")
        {
            return ProductCategoryRecommendationResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ProductRecommendationResponse, Relewise.Client")
        {
            return ProductRecommendationResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.SearchTermRecommendationResponse, Relewise.Client")
        {
            return SearchTermRecommendationResponse::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = TimedResponse::hydrateBase($result, $arr);
        return $result;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
