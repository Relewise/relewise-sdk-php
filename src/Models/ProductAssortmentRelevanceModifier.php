<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Product depending on whether the Assortments match Assortments. */
class ProductAssortmentRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductAssortmentRelevanceModifier, Relewise.Client";
    /** The assortments that this RelevanceModifier will multiply the weight for. */
    public array $assortments;
    /** The weight that this RelevanceModifier will multiply relevant products with. */
    public float $multiplyWeightBy;
    /** Creates <inheritdoc cref="T:Relewise.Client.Requests.RelevanceModifiers.ProductAssortmentRelevanceModifier">            </inheritdoc> */
    public static function create(array $assortments, float $multiplyWeightBy = 1) : ProductAssortmentRelevanceModifier
    {
        $result = new ProductAssortmentRelevanceModifier();
        $result->assortments = $assortments;
        $result->multiplyWeightBy = $multiplyWeightBy;
        return $result;
    }
    public static function hydrate(array $arr) : ProductAssortmentRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new ProductAssortmentRelevanceModifier(), $arr);
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
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * Sets assortments to a new value from an array.
     * @param int[] $assortments new value.
     */
    function setAssortmentsFromArray(array $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * Adds a new element to assortments.
     * @param int $assortments new element.
     */
    function addToAssortments(int $assortments)
    {
        if (!isset($this->assortments))
        {
            $this->assortments = array();
        }
        array_push($this->assortments, $assortments);
        return $this;
    }
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
