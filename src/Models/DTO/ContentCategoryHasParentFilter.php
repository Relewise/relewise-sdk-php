<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentCategoryHasParentFilter extends HasParentCategoryFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentCategoryHasParentFilter, Relewise.Client";
    public static function create() : ContentCategoryHasParentFilter
    {
        $result = new ContentCategoryHasParentFilter();
        $result->negated = false;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryHasParentFilter
    {
        $result = HasParentCategoryFilter::hydrateBase(new ContentCategoryHasParentFilter(), $arr);
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
