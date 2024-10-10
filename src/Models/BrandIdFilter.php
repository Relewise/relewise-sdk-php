<?php declare(strict_types=1);

namespace Relewise\Models;

class BrandIdFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.BrandIdFilter, Relewise.Client";
    public array $brandIds;
    
    public static function create(bool $negated = false) : BrandIdFilter
    {
        $result = new BrandIdFilter();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : BrandIdFilter
    {
        $result = Filter::hydrateBase(new BrandIdFilter(), $arr);
        if (array_key_exists("brandIds", $arr))
        {
            $result->brandIds = array();
            foreach($arr["brandIds"] as &$value)
            {
                array_push($result->brandIds, $value);
            }
        }
        return $result;
    }
    
    function setBrandIds(string ... $brandIds)
    {
        $this->brandIds = $brandIds;
        return $this;
    }
    
    /** @param string[] $brandIds new value. */
    function setBrandIdsFromArray(array $brandIds)
    {
        $this->brandIds = $brandIds;
        return $this;
    }
    
    function addToBrandIds(string $brandIds)
    {
        if (!isset($this->brandIds))
        {
            $this->brandIds = array();
        }
        array_push($this->brandIds, $brandIds);
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
