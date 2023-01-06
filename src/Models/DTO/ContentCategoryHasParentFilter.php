<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentCategoryHasParentFilter extends HasParentCategoryFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentCategoryHasParentFilter, Relewise.Client";
    public static function create(bool $negated = false) : ContentCategoryHasParentFilter
    {
        $result = new ContentCategoryHasParentFilter();
        $result->negated = $negated;
        $result->negated = false;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryHasParentFilter
    {
        $result = HasParentCategoryFilter::hydrateBase(new ContentCategoryHasParentFilter(), $arr);
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
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
