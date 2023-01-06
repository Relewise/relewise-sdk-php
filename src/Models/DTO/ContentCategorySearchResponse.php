<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentCategorySearchResponse extends PaginatedSearchResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.ContentCategorySearchResponse, Relewise.Client";
    public static function create() : ContentCategorySearchResponse
    {
        $result = new ContentCategorySearchResponse();
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategorySearchResponse
    {
        $result = PaginatedSearchResponse::hydrateBase(new ContentCategorySearchResponse(), $arr);
        return $result;
    }
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
