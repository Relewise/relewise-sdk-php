<?php declare(strict_types=1);

namespace Relewise\Models;

class AbandonedContentSearch extends stringAbandonedSearch
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.AbandonedContentSearch, Relewise.Client";
    
    public static function create() : AbandonedContentSearch
    {
        $result = new AbandonedContentSearch();
        return $result;
    }
    
    public static function hydrate(array $arr) : AbandonedContentSearch
    {
        $result = stringAbandonedSearch::hydrateBase(new AbandonedContentSearch(), $arr);
        return $result;
    }
    
    function setTopResults(string ... $topResults)
    {
        $this->topResults = $topResults;
        return $this;
    }
    
    /** @param string[] $topResults new value. */
    function setTopResultsFromArray(array $topResults)
    {
        $this->topResults = $topResults;
        return $this;
    }
    
    function addToTopResults(string $topResults)
    {
        if (!isset($this->topResults))
        {
            $this->topResults = array();
        }
        array_push($this->topResults, $topResults);
        return $this;
    }
    
    function setLoweredSearchTerm(string $loweredSearchTerm)
    {
        $this->loweredSearchTerm = $loweredSearchTerm;
        return $this;
    }
    
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
}
