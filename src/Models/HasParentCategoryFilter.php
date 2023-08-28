<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class HasParentCategoryFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.HasParentCategoryFilter, Relewise.Client";
    public array $categoryIds;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryHasParentFilter, Relewise.Client")
        {
            return ContentCategoryHasParentFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryHasParentFilter, Relewise.Client")
        {
            return ProductCategoryHasParentFilter::hydrate($arr);
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
    function setCategoryIdsFromArray(array $categoryIds)
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
    function setSettings(?FilterSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
