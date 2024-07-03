<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class ProductAndVariantIdAbandonedSearch extends AbandonedSearch
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.AbandonedSearch`1[[Relewise.Client.DataTypes.ProductAndVariantId, Relewise.Client, Version=1.156.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public array $topResults;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.Triggers.Results.AbandonedProductSearch, Relewise.Client")
        {
            return AbandonedProductSearch::hydrate($arr);
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
                array_push($result->topResults, ProductAndVariantId::hydrate($value));
            }
        }
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
