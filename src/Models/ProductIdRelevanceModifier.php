<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Product depending on whether it is contained in a set of ProductIds. */
class ProductIdRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductIdRelevanceModifier, Relewise.Client";
    /** The Ids of the Products that this RelevanceModifier will distinguish on. */
    public array $productIds;
    public float $multiplyWeightBy;
    /** Determines whether this RelevanceModifier should apply to all the Products that don't match one of the specified ProductIds instead. */
    public bool $negated;
    /** Creates <inheritdoc cref="T:Relewise.Client.Requests.RelevanceModifiers.ProductIdRelevanceModifier" path="/summary">            </inheritdoc> */
    public static function create(array $productIds, float $multiplyWeightBy = 1, bool $negated = false) : ProductIdRelevanceModifier
    {
        $result = new ProductIdRelevanceModifier();
        $result->productIds = $productIds;
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
    /**
     * Sets productIds to a new value.
     * @param string[] $productIds new value.
     */
    function setProductIds(string ... $productIds)
    {
        $this->productIds = $productIds;
        return $this;
    }
    /**
     * Sets productIds to a new value from an array.
     * @param string[] $productIds new value.
     */
    function setProductIdsFromArray(array $productIds)
    {
        $this->productIds = $productIds;
        return $this;
    }
    /**
     * Adds a new element to productIds.
     * @param string $productIds new element.
     */
    function addToProductIds(string $productIds)
    {
        if (!isset($this->productIds))
        {
            $this->productIds = array();
        }
        array_push($this->productIds, $productIds);
        return $this;
    }
    /**
     * Sets multiplyWeightBy to a new value.
     * @param float $multiplyWeightBy new value.
     */
    function setMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
        return $this;
    }
    /**
     * Sets negated to a new value.
     * @param bool $negated new value.
     */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    /**
     * Sets filters to a new value.
     * @param FilterCollection $filters new value.
     */
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
