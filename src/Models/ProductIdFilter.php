<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductIdFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductIdFilter, Relewise.Client";
    public array $productIds;
    
    public static function create(bool $negated = false) : ProductIdFilter
    {
        $result = new ProductIdFilter();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductIdFilter
    {
        $result = Filter::hydrateBase(new ProductIdFilter(), $arr);
        if (array_key_exists("productIds", $arr))
        {
            $result->productIds = array();
            foreach($arr["productIds"] as &$value)
            {
                array_push($result->productIds, $value);
            }
        }
        return $result;
    }
    
    function setProductIds(string ... $productIds)
    {
        $this->productIds = $productIds;
        return $this;
    }
    
    /** @param string[] $productIds new value. */
    function setProductIdsFromArray(array $productIds)
    {
        $this->productIds = $productIds;
        return $this;
    }
    
    function addToProductIds(string $productIds)
    {
        if (!isset($this->productIds))
        {
            $this->productIds = array();
        }
        array_push($this->productIds, $productIds);
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
