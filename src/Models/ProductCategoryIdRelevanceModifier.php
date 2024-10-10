<?php declare(strict_types=1);

namespace Relewise\Models;

/** a RelevanceModifier that can change the relevance of a Product depending on if the product is in a category that matches the given CategoryId and EvaluationScope. */
class ProductCategoryIdRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductCategoryIdRelevanceModifier, Relewise.Client";
    /** The Id of the Category that this RelevanceModifier will multiply the weight for. */
    public string $categoryId;
    
    /** The relative Category levels that this RelevanceModifier should match with. */
    public CategoryScope $evaluationScope;
    
    /** The weight that this RelevanceModifier will multiply relevant products with. */
    public float $multiplyWeightBy;
    
    /** Determines whether this RelevanceModifier should apply to all the Products that don't match the specific CategoryId instead. */
    public bool $negated;
    
    /**
     * Creates a RelevanceModifier that can change the relevance of a Product depending on if the product is in a category that matches the given CategoryId and EvaluationScope.
     * @param string $categoryId The Id of the Category that this RelevanceModifier will multiply the weight for.
     * @param CategoryScope $evaluationScope The relative Category levels that this RelevanceModifier should match with.
     * @param float $multiplyWeightBy The weight that this RelevanceModifier will multiply relevant products with.
     * @param bool $negated Determines whether this RelevanceModifier should apply to all the Products that don't match the specific CategoryId instead.
     */
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
    
    /** The Id of the Category that this RelevanceModifier will multiply the weight for. */
    function setCategoryId(string $categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }
    
    /** The relative Category levels that this RelevanceModifier should match with. */
    function setEvaluationScope(CategoryScope $evaluationScope)
    {
        $this->evaluationScope = $evaluationScope;
        return $this;
    }
    
    /** The weight that this RelevanceModifier will multiply relevant products with. */
    function setMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
        return $this;
    }
    
    /** Determines whether this RelevanceModifier should apply to all the Products that don't match the specific CategoryId instead. */
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
