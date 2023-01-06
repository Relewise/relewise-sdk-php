<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentCategoryHasChildFilter extends HasChildCategoryFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentCategoryHasChildFilter, Relewise.Client";
    public static function create() : ContentCategoryHasChildFilter
    {
        $result = new ContentCategoryHasChildFilter();
        $result->negated = false;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryHasChildFilter
    {
        $result = HasChildCategoryFilter::hydrateBase(new ContentCategoryHasChildFilter(), $arr);
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
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
