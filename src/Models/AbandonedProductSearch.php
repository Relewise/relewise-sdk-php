<?php declare(strict_types=1);

namespace Relewise\Models;

class AbandonedProductSearch extends ProductAndVariantIdAbandonedSearch
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.AbandonedProductSearch, Relewise.Client";
    public static function create() : AbandonedProductSearch
    {
        $result = new AbandonedProductSearch();
        return $result;
    }
    
    public static function hydrate(array $arr) : AbandonedProductSearch
    {
        $result = ProductAndVariantIdAbandonedSearch::hydrateBase(new AbandonedProductSearch(), $arr);
        return $result;
    }
    
    function setTopResults(ProductAndVariantId ... $topResults)
    {
        $this->topResults = $topResults;
        return $this;
    }
    
    /** @param ProductAndVariantId[] $topResults new value. */
    function setTopResultsFromArray(array $topResults)
    {
        $this->topResults = $topResults;
        return $this;
    }
    
    function addToTopResults(ProductAndVariantId $topResults)
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
