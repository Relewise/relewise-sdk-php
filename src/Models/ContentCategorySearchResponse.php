<?php declare(strict_types=1);

namespace Relewise\Models;

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
