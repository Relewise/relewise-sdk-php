<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class SearchResponse extends TimedResponse
{
    public string $typeDefinition = "";
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Search.ContentCategorySearchResponse, Relewise.Client")
        {
            return ContentCategorySearchResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.ContentSearchResponse, Relewise.Client")
        {
            return ContentSearchResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.ProductCategorySearchResponse, Relewise.Client")
        {
            return ProductCategorySearchResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.ProductSearchResponse, Relewise.Client")
        {
            return ProductSearchResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.SearchResponseCollection, Relewise.Client")
        {
            return SearchResponseCollection::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.SearchTermPredictionResponse, Relewise.Client")
        {
            return SearchTermPredictionResponse::hydrate($arr);
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
