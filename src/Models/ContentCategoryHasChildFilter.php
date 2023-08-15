<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentCategoryHasChildFilter extends HasChildCategoryFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentCategoryHasChildFilter, Relewise.Client";
    public static function create(bool $negated = false) : ContentCategoryHasChildFilter
    {
        $result = new ContentCategoryHasChildFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryHasChildFilter
    {
        $result = HasChildCategoryFilter::hydrateBase(new ContentCategoryHasChildFilter(), $arr);
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
