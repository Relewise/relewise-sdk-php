<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
