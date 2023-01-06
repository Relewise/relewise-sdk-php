<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryIdRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductCategoryIdRelevanceModifier, Relewise.Client";
    public string $categoryId;
    public CategoryScope $evaluationScope;
    public float $multiplyWeightBy;
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
    function withCategoryId(string $categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }
    function withEvaluationScope(CategoryScope $evaluationScope)
    {
        $this->evaluationScope = $evaluationScope;
        return $this;
    }
    function withMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
