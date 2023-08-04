<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> that can change the relevance of a Product depending on whether it is contained in a set of <see cref="P:Relewise.Client.Requests.RelevanceModifiers.ProductIdRelevanceModifier.ProductIds">.            </see></see> */
class ProductIdRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductIdRelevanceModifier, Relewise.Client";
    /** The Ids of the Products that this <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> will distinguish on.            </see> */
    public array $productIds;
    public float $multiplyWeightBy;
    /** Determines whether this <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> should apply to all the Products that don't match one of the specified <see cref="P:Relewise.Client.Requests.RelevanceModifiers.ProductIdRelevanceModifier.ProductIds"> instead.            </see></see> */
    public bool $negated;
    public static function create(float $multiplyWeightBy = 1, bool $negated = false) : ProductIdRelevanceModifier
    {
        $result = new ProductIdRelevanceModifier();
        $result->multiplyWeightBy = $multiplyWeightBy;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductIdRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new ProductIdRelevanceModifier(), $arr);
        if (array_key_exists("productIds", $arr))
        {
            $result->productIds = array();
            foreach($arr["productIds"] as &$value)
            {
                array_push($result->productIds, $value);
            }
        }
        if (array_key_exists("multiplyWeightBy", $arr))
        {
            $result->multiplyWeightBy = $arr["multiplyWeightBy"];
        }
        if (array_key_exists("negated", $arr))
        {
            $result->negated = $arr["negated"];
        }
        return $result;
    }
    function setProductIds(string ... $productIds)
    {
        $this->productIds = $productIds;
        return $this;
    }
    function setProductIdsFromArray(array $productIds)
    {
        $this->productIds = $productIds;
        return $this;
    }
    function addToProductIds(string $productIds)
    {
        if (!isset($this->productIds))
        {
            $this->productIds = array();
        }
        array_push($this->productIds, $productIds);
        return $this;
    }
    function setMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
        return $this;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
