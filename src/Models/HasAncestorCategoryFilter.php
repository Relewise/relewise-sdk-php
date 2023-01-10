<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class HasAncestorCategoryFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.HasAncestorCategoryFilter, Relewise.Client";
    public array $categoryIds;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryHasAncestorFilter, Relewise.Client")
        {
            return ContentCategoryHasAncestorFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryHasAncestorFilter, Relewise.Client")
        {
            return ProductCategoryHasAncestorFilter::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = Filter::hydrateBase($result, $arr);
        if (array_key_exists("categoryIds", $arr))
        {
            $result->categoryIds = array();
            foreach($arr["categoryIds"] as &$value)
            {
                array_push($result->categoryIds, $value);
            }
        }
        return $result;
    }
    function setCategoryIds(string ... $categoryIds)
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }
    function addToCategoryIds(string $categoryIds)
    {
        if (!isset($this->categoryIds))
        {
            $this->categoryIds = array();
        }
        array_push($this->categoryIds, $categoryIds);
        return $this;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
