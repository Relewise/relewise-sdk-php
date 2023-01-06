<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryLevelFilter extends CategoryLevelFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductCategoryLevelFilter, Relewise.Client";
    public static function create() : ProductCategoryLevelFilter
    {
        $result = new ProductCategoryLevelFilter();
        $result->negated = false;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryLevelFilter
    {
        $result = CategoryLevelFilter::hydrateBase(new ProductCategoryLevelFilter(), $arr);
        return $result;
    }
    function withLevels(int ... $levels)
    {
        $this->levels = $levels;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
