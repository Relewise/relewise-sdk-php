<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> that can change the relevance of a Product depending on if the product is in a category that matches the given <see cref="P:Relewise.Client.Requests.RelevanceModifiers.ProductCategoryIdRelevanceModifier.CategoryId"> and <see cref="P:Relewise.Client.Requests.RelevanceModifiers.ProductCategoryIdRelevanceModifier.EvaluationScope">.            </see></see></see> */
class ProductCategoryIdRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductCategoryIdRelevanceModifier, Relewise.Client";
    /** The Id of the Category that this <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> will multiply the weight for.            </see> */
    public string $categoryId;
    /** The relative Category levels that this <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> should match with.            </see> */
    public CategoryScope $evaluationScope;
    public float $multiplyWeightBy;
    /** Determines whether this <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> should apply to all the Products that don't match the specific <see cref="P:Relewise.Client.Requests.RelevanceModifiers.ProductCategoryIdRelevanceModifier.CategoryId"> instead.            </see></see> */
    public bool $negated;
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
    function setCategoryId(string $categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }
    function setEvaluationScope(CategoryScope $evaluationScope)
    {
        $this->evaluationScope = $evaluationScope;
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
