<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentCategoryLevelFilter extends CategoryLevelFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentCategoryLevelFilter, Relewise.Client";
    public static function create() : ContentCategoryLevelFilter
    {
        $result = new ContentCategoryLevelFilter();
        $result->negated = false;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryLevelFilter
    {
        $result = CategoryLevelFilter::hydrateBase(new ContentCategoryLevelFilter(), $arr);
        return $result;
    }
    function setLevels(int ... $levels)
    {
        $this->levels = $levels;
        return $this;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
