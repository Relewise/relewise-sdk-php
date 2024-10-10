<?php declare(strict_types=1);

namespace Relewise\Models;

class VariantIdFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.VariantIdFilter, Relewise.Client";
    
    public array $variantIds;
    
    public static function create(bool $negated = false) : VariantIdFilter
    {
        $result = new VariantIdFilter();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : VariantIdFilter
    {
        $result = Filter::hydrateBase(new VariantIdFilter(), $arr);
        if (array_key_exists("variantIds", $arr))
        {
            $result->variantIds = array();
            foreach($arr["variantIds"] as &$value)
            {
                array_push($result->variantIds, $value);
            }
        }
        return $result;
    }
    
    function setVariantIds(string ... $variantIds)
    {
        $this->variantIds = $variantIds;
        return $this;
    }
    
    /** @param string[] $variantIds new value. */
    function setVariantIdsFromArray(array $variantIds)
    {
        $this->variantIds = $variantIds;
        return $this;
    }
    
    function addToVariantIds(string $variantIds)
    {
        if (!isset($this->variantIds))
        {
            $this->variantIds = array();
        }
        array_push($this->variantIds, $variantIds);
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
