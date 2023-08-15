<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class HasChildCategoryFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.HasChildCategoryFilter, Relewise.Client";
    public array $categoryIds;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryHasChildFilter, Relewise.Client")
        {
            return ContentCategoryHasChildFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryHasChildFilter, Relewise.Client")
        {
            return ProductCategoryHasChildFilter::hydrate($arr);
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
     * Sets negated to a new value.
     * @param bool $negated new value.
     */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
