<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Product depending on whether it is contained in a set of ProductIds. */
class ProductIdRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductIdRelevanceModifier, Relewise.Client";
    /** The Ids of the Products that this RelevanceModifier will distinguish on. */
    public array $productIds;
    /** The weight that this RelevanceModifier will multiply relevant products with. */
    public float $multiplyWeightBy;
    /** Determines whether this RelevanceModifier should apply to all the Products that don't match one of the specified ProductIds instead. */
    public bool $negated;
    /**
     * Creates a RelevanceModifier that can change the relevance of a Product depending on whether it is contained in a set of ProductIds.
     * @param string[] $productIds The Ids of the Products that this RelevanceModifier will distinguish on.
     * @param float $multiplyWeightBy The weight that this RelevanceModifier will multiply relevant products with.
     * @param bool $negated Determines whether this RelevanceModifier should apply to all the Products that don't match one of the specified ProductIds instead.
     */
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
    /** The Ids of the Products that this RelevanceModifier will distinguish on. */
    function setProductIds(string ... $productIds)
    {
        $this->productIds = $productIds;
        return $this;
    }
    /**
     * The Ids of the Products that this RelevanceModifier will distinguish on.
     * @param string[] $productIds new value.
     */
    function setProductIdsFromArray(array $productIds)
    {
        $this->productIds = $productIds;
        return $this;
    }
    /** The Ids of the Products that this RelevanceModifier will distinguish on. */
    function addToProductIds(string $productIds)
    {
        if (!isset($this->productIds))
        {
            $this->productIds = array();
        }
        array_push($this->productIds, $productIds);
        return $this;
    }
    /** The weight that this RelevanceModifier will multiply relevant products with. */
    function setMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
        return $this;
    }
    /** Determines whether this RelevanceModifier should apply to all the Products that don't match one of the specified ProductIds instead. */
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
