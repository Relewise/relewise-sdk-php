<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentCategoryHasAncestorFilter extends HasAncestorCategoryFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentCategoryHasAncestorFilter, Relewise.Client";
    public static function create() : ContentCategoryHasAncestorFilter
    {
        $result = new ContentCategoryHasAncestorFilter();
        $result->negated = false;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryHasAncestorFilter
    {
        $result = HasAncestorCategoryFilter::hydrateBase(new ContentCategoryHasAncestorFilter(), $arr);
        return $result;
    }
    function withCategoryIds(string ... $categoryIds)
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
