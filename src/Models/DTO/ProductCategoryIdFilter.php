<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryIdFilter extends CategoryIdFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductCategoryIdFilter, Relewise.Client";
    public static function create() : ProductCategoryIdFilter
    {
        $result = new ProductCategoryIdFilter();
        $result->negated = false;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryIdFilter
    {
        $result = CategoryIdFilter::hydrateBase(new ProductCategoryIdFilter(), $arr);
        return $result;
    }
    function setCategoryIds(string ... $categoryIds)
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }
    function addToCategoryIds(string $categoryIds)
    {
        if (!isset($this->categoryIds))
        {
            $this->categoryIds = array();
        }
        array_push($this->categoryIds, $categoryIds);
        return $this;
    }
    function setEvaluationScope(CategoryScope $evaluationScope)
    {
        $this->evaluationScope = $evaluationScope;
        return $this;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
