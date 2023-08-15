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
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryLevelFilter
    {
        $result = CategoryLevelFilter::hydrateBase(new ProductCategoryLevelFilter(), $arr);
        return $result;
    }
    /**
     * Sets levels to a new value.
     * @param int[] $levels new value.
     */
    function setLevels(int ... $levels)
    {
        $this->levels = $levels;
        return $this;
    }
    /**
     * Sets levels to a new value from an array.
     * @param int[] $levels new value.
     */
    function setLevelsFromArray(array $levels)
    {
        $this->levels = $levels;
        return $this;
    }
    /**
     * Adds a new element to levels.
     * @param int $levels new element.
     */
    function addToLevels(int $levels)
    {
        if (!isset($this->levels))
        {
            $this->levels = array();
        }
        array_push($this->levels, $levels);
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
