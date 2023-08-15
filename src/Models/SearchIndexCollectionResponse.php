<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets indexes to a new value.
     * @param SearchIndex[] $indexes new value.
     */
    function setIndexes(SearchIndex ... $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    /**
     * Sets indexes to a new value from an array.
     * @param SearchIndex[] $indexes new value.
     */
    function setIndexesFromArray(array $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    /**
     * Adds a new element to indexes.
     * @param SearchIndex $indexes new element.
     */
    function addToIndexes(SearchIndex $indexes)
    {
        if (!isset($this->indexes))
        {
            $this->indexes = array();
        }
        array_push($this->indexes, $indexes);
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
