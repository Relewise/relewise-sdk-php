<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class ProductAndVariantIdAbandonedSearch extends AbandonedSearch
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.AbandonedSearch`1[[Relewise.Client.DataTypes.ProductAndVariantId, Relewise.Client, Version=1.61.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
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
    /**
     * Sets topResults to a new value.
     * @param ProductAndVariantId[] $topResults new value.
     */
    function setTopResults(ProductAndVariantId ... $topResults)
    {
        $this->topResults = $topResults;
        return $this;
    }
    /**
     * Sets topResults to a new value from an array.
     * @param ProductAndVariantId[] $topResults new value.
     */
    function setTopResultsFromArray(array $topResults)
    {
        $this->topResults = $topResults;
        return $this;
    }
    /**
     * Adds a new element to topResults.
     * @param ProductAndVariantId $topResults new element.
     */
    function addToTopResults(ProductAndVariantId $topResults)
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
