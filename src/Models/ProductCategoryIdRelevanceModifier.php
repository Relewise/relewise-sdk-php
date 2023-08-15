<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Product depending on if the product is in a category that matches the given CategoryId and EvaluationScope. */
class ProductCategoryIdRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductCategoryIdRelevanceModifier, Relewise.Client";
    /** The Id of the Category that this RelevanceModifier will multiply the weight for. */
    public string $categoryId;
    /** The relative Category levels that this RelevanceModifier should match with. */
    public CategoryScope $evaluationScope;
    public float $multiplyWeightBy;
    /** Determines whether this RelevanceModifier should apply to all the Products that don't match the specific CategoryId instead. */
    public bool $negated;
    /** Creates <inheritdoc cref="T:Relewise.Client.Requests.RelevanceModifiers.ProductCategoryIdRelevanceModifier">            </inheritdoc> */
    public static function create(string $categoryId, CategoryScope $evaluationScope, float $multiplyWeightBy = 1, bool $negated = false) : ProductCategoryIdRelevanceModifier
    {
        $result = new ProductCategoryIdRelevanceModifier();
        $result->categoryId = $categoryId;
        $result->evaluationScope = $evaluationScope;
        $result->multiplyWeightBy = $multiplyWeightBy;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryIdRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new ProductCategoryIdRelevanceModifier(), $arr);
        if (array_key_exists("categoryId", $arr))
        {
            $result->categoryId = $arr["categoryId"];
        }
        if (array_key_exists("evaluationScope", $arr))
        {
            $result->evaluationScope = CategoryScope::from($arr["evaluationScope"]);
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
     * Sets categoryId to a new value.
     * @param string $categoryId new value.
     */
    function setCategoryId(string $categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }
    /**
     * Sets evaluationScope to a new value.
     * @param CategoryScope $evaluationScope new value.
     */
    function setEvaluationScope(CategoryScope $evaluationScope)
    {
        $this->evaluationScope = $evaluationScope;
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
