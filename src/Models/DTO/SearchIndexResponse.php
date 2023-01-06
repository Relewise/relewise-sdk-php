<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SearchIndexResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.SearchIndexResponse, Relewise.Client";
    public SearchIndex $index;
    public static function create() : SearchIndexResponse
    {
        $result = new SearchIndexResponse();
        return $result;
    }
    public static function hydrate(array $arr) : SearchIndexResponse
    {
        $result = TimedResponse::hydrateBase(new SearchIndexResponse(), $arr);
        if (array_key_exists("index", $arr))
        {
            $result->index = SearchIndex::hydrate($arr["index"]);
        }
        return $result;
    }
    function withIndex(SearchIndex $index)
    {
        $this->index = $index;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}