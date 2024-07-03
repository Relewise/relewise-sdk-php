<?php declare(strict_types=1);

namespace Relewise\Models;

/** a RelevanceModifier that can change the relevance of a Variant depending on whether the Assortments match Assortments. */
class VariantAssortmentRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.VariantAssortmentRelevanceModifier, Relewise.Client";
    /** The assortments that this RelevanceModifier will multiply the weight for. */
    public array $assortments;
    /** The weight that this RelevanceModifier will multiply relevant variants with. */
    public float $multiplyWeightBy;
    /**
     * Creates a RelevanceModifier that can change the relevance of a Variant depending on whether the Assortments match Assortments.
     * @param int[] $assortments The assortments that this RelevanceModifier will multiply the weight for.
     * @param float $multiplyWeightBy The weight that this RelevanceModifier will multiply relevant variants with.
     */
    public static function create(array $assortments, float $multiplyWeightBy = 1) : VariantAssortmentRelevanceModifier
    {
        $result = new VariantAssortmentRelevanceModifier();
        $result->assortments = $assortments;
        $result->multiplyWeightBy = $multiplyWeightBy;
        return $result;
    }
    public static function hydrate(array $arr) : VariantAssortmentRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new VariantAssortmentRelevanceModifier(), $arr);
        if (array_key_exists("assortments", $arr))
        {
            $result->assortments = array();
            foreach($arr["assortments"] as &$value)
            {
                array_push($result->assortments, $value);
            }
        }
        if (array_key_exists("multiplyWeightBy", $arr))
        {
            $result->multiplyWeightBy = $arr["multiplyWeightBy"];
        }
        return $result;
    }
    /** The assortments that this RelevanceModifier will multiply the weight for. */
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * The assortments that this RelevanceModifier will multiply the weight for.
     * @param int[] $assortments new value.
     */
    function setAssortmentsFromArray(array $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /** The assortments that this RelevanceModifier will multiply the weight for. */
    function addToAssortments(int $assortments)
    {
        if (!isset($this->assortments))
        {
            $this->assortments = array();
        }
        array_push($this->assortments, $assortments);
        return $this;
    }
    /** The weight that this RelevanceModifier will multiply relevant variants with. */
    function setMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
        return $this;
    }
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
