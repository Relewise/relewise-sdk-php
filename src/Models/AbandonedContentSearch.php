<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
    /**
     * Sets topResults to a new value.
     * @param string[] $topResults new value.
     */
    function setTopResults(string ... $topResults)
    {
        $this->topResults = $topResults;
        return $this;
    }
    /**
     * Sets topResults to a new value from an array.
     * @param string[] $topResults new value.
     */
    function setTopResultsFromArray(array $topResults)
    {
        $this->topResults = $topResults;
        return $this;
    }
    /**
     * Adds a new element to topResults.
     * @param string $topResults new element.
     */
    function addToTopResults(string $topResults)
    {
        if (!isset($this->topResults))
        {
            $this->topResults = array();
        }
        array_push($this->topResults, $topResults);
        return $this;
    }
    /**
     * Sets loweredSearchTerm to a new value.
     * @param string $loweredSearchTerm new value.
     */
    function setLoweredSearchTerm(string $loweredSearchTerm)
    {
        $this->loweredSearchTerm = $loweredSearchTerm;
        return $this;
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
}
