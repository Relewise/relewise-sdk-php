<?php declare(strict_types=1);

namespace Relewise\Models;

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
    
    function setIndexes(SearchIndex ... $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    
    /** @param SearchIndex[] $indexes new value. */
    function setIndexesFromArray(array $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    
    function addToIndexes(SearchIndex $indexes)
    {
        if (!isset($this->indexes))
        {
            $this->indexes = array();
        }
        array_push($this->indexes, $indexes);
        return $this;
    }
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
