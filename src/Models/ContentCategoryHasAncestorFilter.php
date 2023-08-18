<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentCategoryHasAncestorFilter extends HasAncestorCategoryFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentCategoryHasAncestorFilter, Relewise.Client";
    public static function create(bool $negated = false) : ContentCategoryHasAncestorFilter
    {
        $result = new ContentCategoryHasAncestorFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryHasAncestorFilter
    {
        $result = HasAncestorCategoryFilter::hydrateBase(new ContentCategoryHasAncestorFilter(), $arr);
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
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
