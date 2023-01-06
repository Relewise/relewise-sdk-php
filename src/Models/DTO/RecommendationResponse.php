<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class RecommendationResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.RecommendationResponse, Relewise.Client";
    public array $custom;
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
        if (array_key_exists("custom", $arr))
        {
            $result->custom = array();
            foreach($arr["custom"] as $key => $value)
            {
                $result->custom[$key] = $value;
            }
        }
        return $result;
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
