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
    function setLevels(int ... $levels)
    {
        $this->levels = $levels;
        return $this;
    }
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
