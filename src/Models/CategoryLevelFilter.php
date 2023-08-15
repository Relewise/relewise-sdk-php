<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class CategoryLevelFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.CategoryLevelFilter, Relewise.Client";
    public array $levels;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryLevelFilter, Relewise.Client")
        {
            return ContentCategoryLevelFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryLevelFilter, Relewise.Client")
        {
            return ProductCategoryLevelFilter::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = Filter::hydrateBase($result, $arr);
        if (array_key_exists("levels", $arr))
        {
            $result->levels = array();
            foreach($arr["levels"] as &$value)
            {
                array_push($result->levels, $value);
            }
        }
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
