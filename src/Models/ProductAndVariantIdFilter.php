<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductAndVariantIdFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductAndVariantIdFilter, Relewise.Client";
    public array $productAndVariantIds;
    public static function create(bool $negated = false) : ProductAndVariantIdFilter
    {
        $result = new ProductAndVariantIdFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductAndVariantIdFilter
    {
        $result = Filter::hydrateBase(new ProductAndVariantIdFilter(), $arr);
        if (array_key_exists("productAndVariantIds", $arr))
        {
            $result->productAndVariantIds = array();
            foreach($arr["productAndVariantIds"] as &$value)
            {
                array_push($result->productAndVariantIds, ProductAndVariantId::hydrate($value));
            }
        }
        return $result;
    }
    function setProductAndVariantIds(ProductAndVariantId ... $productAndVariantIds)
    {
        $this->productAndVariantIds = $productAndVariantIds;
        return $this;
    }
    function setProductAndVariantIdsFromArray(array $productAndVariantIds)
    {
        $this->productAndVariantIds = $productAndVariantIds;
        return $this;
    }
    function addToProductAndVariantIds(ProductAndVariantId $productAndVariantIds)
    {
        if (!isset($this->productAndVariantIds))
        {
            $this->productAndVariantIds = array();
        }
        array_push($this->productAndVariantIds, $productAndVariantIds);
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
