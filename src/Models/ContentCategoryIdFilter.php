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
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryIdFilter
    {
        $result = CategoryIdFilter::hydrateBase(new ContentCategoryIdFilter(), $arr);
        return $result;
    }
    /**
     * Sets categoryIds to a new value.
     * @param string[] $categoryIds new value.
     */
    function setCategoryIds(string ... $categoryIds)
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }
    /**
     * Sets categoryIds to a new value from an array.
     * @param string[] $categoryIds new value.
     */
    function setCategoryIdsFromArray(array $categoryIds)
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }
    /**
     * Adds a new element to categoryIds.
     * @param string $categoryIds new element.
     */
    function addToCategoryIds(string $categoryIds)
    {
        if (!isset($this->categoryIds))
        {
            $this->categoryIds = array();
        }
        array_push($this->categoryIds, $categoryIds);
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
     * Sets negated to a new value.
     * @param bool $negated new value.
     */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
