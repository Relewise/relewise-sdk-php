<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class AbandonedProductCategorySearch extends stringAbandonedSearch
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.AbandonedProductCategorySearch, Relewise.Client";
    public static function create() : AbandonedProductCategorySearch
    {
        $result = new AbandonedProductCategorySearch();
        return $result;
    }
    public static function hydrate(array $arr) : AbandonedProductCategorySearch
    {
        $result = stringAbandonedSearch::hydrateBase(new AbandonedProductCategorySearch(), $arr);
        return $result;
    }
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
}
