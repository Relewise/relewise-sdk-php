<?php declare(strict_types=1);

namespace Relewise\Models;

class CompanyIdFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.CompanyIdFilter, Relewise.Client";
    
    public array $companyIds;
    
    public static function create(bool $negated = false) : CompanyIdFilter
    {
        $result = new CompanyIdFilter();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : CompanyIdFilter
    {
        $result = Filter::hydrateBase(new CompanyIdFilter(), $arr);
        if (array_key_exists("companyIds", $arr))
        {
            $result->companyIds = array();
            foreach($arr["companyIds"] as &$value)
            {
                array_push($result->companyIds, $value);
            }
        }
        return $result;
    }
    
    function setCompanyIds(string ... $companyIds)
    {
        $this->companyIds = $companyIds;
        return $this;
    }
    
    /** @param string[] $companyIds new value. */
    function setCompanyIdsFromArray(array $companyIds)
    {
        $this->companyIds = $companyIds;
        return $this;
    }
    
    function addToCompanyIds(string $companyIds)
    {
        if (!isset($this->companyIds))
        {
            $this->companyIds = array();
        }
        array_push($this->companyIds, $companyIds);
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
