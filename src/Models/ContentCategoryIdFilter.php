<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentCategoryIdFilter extends CategoryIdFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentCategoryIdFilter, Relewise.Client";
    public static function create(CategoryScope $evaluationScope, bool $negated = false) : ContentCategoryIdFilter
    {
        $result = new ContentCategoryIdFilter();
        $result->evaluationScope = $evaluationScope;
        $result->negated = $negated;
        $result->negated = false;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryIdFilter
    {
        $result = CategoryIdFilter::hydrateBase(new ContentCategoryIdFilter(), $arr);
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
