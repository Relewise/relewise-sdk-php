<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Variant depending on whether it is contained in a set of VariantIds. */
class VariantIdRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.VariantIdRelevanceModifier, Relewise.Client";
    /** The Ids of the Variants that this RelevanceModifier will distinguish on. */
    public array $variantIds;
    /** The weight that this RelevanceModifier will multiply relevant variants with. */
    public float $multiplyWeightBy;
    /** Determines whether this RelevanceModifier should apply to all the Variants that don't match one of the specified VariantIds instead. */
    public bool $negated;
    /**
     * Creates a RelevanceModifier that can change the relevance of a Variant depending on whether it is contained in a set of VariantIds.
     * @param string[] $variantIds The Ids of the Variants that this RelevanceModifier will distinguish on.
     * @param float $multiplyWeightBy The weight that this RelevanceModifier will multiply relevant variants with.
     * @param bool $negated Determines whether this RelevanceModifier should apply to all the Variants that don't match one of the specified VariantIds instead.
     */
    public static function create(array $variantIds, float $multiplyWeightBy = 1, bool $negated = false) : VariantIdRelevanceModifier
    {
        $result = new VariantIdRelevanceModifier();
        $result->variantIds = $variantIds;
        $result->multiplyWeightBy = $multiplyWeightBy;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : VariantIdRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new VariantIdRelevanceModifier(), $arr);
        if (array_key_exists("variantIds", $arr))
        {
            $result->variantIds = array();
            foreach($arr["variantIds"] as &$value)
            {
                array_push($result->variantIds, $value);
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
    /** The Ids of the Variants that this RelevanceModifier will distinguish on. */
    function setVariantIds(string ... $variantIds)
    {
        $this->variantIds = $variantIds;
        return $this;
    }
    /**
     * The Ids of the Variants that this RelevanceModifier will distinguish on.
     * @param string[] $variantIds new value.
     */
    function setVariantIdsFromArray(array $variantIds)
    {
        $this->variantIds = $variantIds;
        return $this;
    }
    /** The Ids of the Variants that this RelevanceModifier will distinguish on. */
    function addToVariantIds(string $variantIds)
    {
        if (!isset($this->variantIds))
        {
            $this->variantIds = array();
        }
        array_push($this->variantIds, $variantIds);
        return $this;
    }
    /** The weight that this RelevanceModifier will multiply relevant variants with. */
    function setMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
        return $this;
    }
    /** Determines whether this RelevanceModifier should apply to all the Variants that don't match one of the specified VariantIds instead. */
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
