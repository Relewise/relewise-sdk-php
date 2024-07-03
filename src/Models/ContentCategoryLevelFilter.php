<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentCategoryLevelFilter extends CategoryLevelFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentCategoryLevelFilter, Relewise.Client";
    public static function create(bool $negated = false) : ContentCategoryLevelFilter
    {
        $result = new ContentCategoryLevelFilter();
        $result->negated = $negated;
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
    /** @param int[] $levels new value. */
    function setLevelsFromArray(array $levels)
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
    function setSettings(?FilterSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
