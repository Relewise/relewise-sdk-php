<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class PaginatedSearchResponse extends SearchResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.PaginatedSearchResponse, Relewise.Client";
    public int $hits;
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
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = SearchResponse::hydrateBase($result, $arr);
        if (array_key_exists("hits", $arr))
        {
            $result->hits = $arr["hits"];
        }
        return $result;
    }
    /**
     * Sets hits to a new value.
     * @param int $hits new value.
     */
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    /**
     * Sets statistics to a new value.
     * @param Statistics $statistics new value.
     */
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
