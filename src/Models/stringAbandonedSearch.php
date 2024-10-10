<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class stringAbandonedSearch extends AbandonedSearch
{
    public string $typeDefinition = "";
    
    public array $topResults;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Triggers.Results.AbandonedContentSearch, Relewise.Client")
        {
            return AbandonedContentSearch::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.Results.AbandonedProductCategorySearch, Relewise.Client")
        {
            return AbandonedProductCategorySearch::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = AbandonedSearch::hydrateBase($result, $arr);
        if (array_key_exists("topResults", $arr))
        {
            $result->topResults = array();
            foreach($arr["topResults"] as &$value)
            {
                array_push($result->topResults, $value);
            }
        }
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
