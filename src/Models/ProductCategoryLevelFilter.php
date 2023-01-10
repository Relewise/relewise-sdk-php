<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryLevelFilter extends CategoryLevelFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductCategoryLevelFilter, Relewise.Client";
    public static function create(bool $negated = false) : ProductCategoryLevelFilter
    {
        $result = new ProductCategoryLevelFilter();
        $result->negated = $negated;
        $result->negated = false;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryLevelFilter
    {
        $result = CategoryLevelFilter::hydrateBase(new ProductCategoryLevelFilter(), $arr);
        return $result;
    }
    function setLevels(int ... $levels)
    {
        $this->levels = $levels;
        return $this;
    }
    function addToLevels(int $levels)
    {
        if (!isset($this->levels))
        {
            $this->levels = array();
        }
        array_push($this->levels, $levels);
        return $this;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
