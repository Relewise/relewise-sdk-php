<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SearchIndexCollectionResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.SearchIndexCollectionResponse, Relewise.Client";
    public array $indexes;
    public static function create() : SearchIndexCollectionResponse
    {
        $result = new SearchIndexCollectionResponse();
        return $result;
    }
    public static function hydrate(array $arr) : SearchIndexCollectionResponse
    {
        $result = TimedResponse::hydrateBase(new SearchIndexCollectionResponse(), $arr);
        if (array_key_exists("indexes", $arr))
        {
            $result->indexes = array();
            foreach($arr["indexes"] as &$value)
            {
                array_push($result->indexes, SearchIndex::hydrate($value));
            }
        }
        return $result;
    }
    function withIndexes(SearchIndex ... $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
