<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class CategoryIdFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.CategoryIdFilter, Relewise.Client";
    public array $categoryIds;
    public CategoryScope $evaluationScope;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryIdFilter, Relewise.Client")
        {
            return ContentCategoryIdFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryIdFilter, Relewise.Client")
        {
            return ProductCategoryIdFilter::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = Filter::hydrateBase($result, $arr);
        if (array_key_exists("categoryIds", $arr))
        {
            $result->categoryIds = array();
            foreach($arr["categoryIds"] as &$value)
            {
                array_push($result->categoryIds, $value);
            }
        }
        if (array_key_exists("evaluationScope", $arr))
        {
            $result->evaluationScope = CategoryScope::from($arr["evaluationScope"]);
        }
        return $result;
    }
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
