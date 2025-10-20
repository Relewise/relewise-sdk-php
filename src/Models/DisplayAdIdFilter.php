<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdIdFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DisplayAdIdFilter, Relewise.Client";
    public ?array $ids;
    
    public static function create(bool $negated = false) : DisplayAdIdFilter
    {
        $result = new DisplayAdIdFilter();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdIdFilter
    {
        $result = Filter::hydrateBase(new DisplayAdIdFilter(), $arr);
        if (array_key_exists("ids", $arr))
        {
            $result->ids = array();
            foreach($arr["ids"] as &$value)
            {
                array_push($result->ids, $value);
            }
        }
        return $result;
    }
    
    function setIds(string ... $ids)
    {
        $this->ids = $ids;
        return $this;
    }
    
    /** @param ?string[] $ids new value. */
    function setIdsFromArray(array $ids)
    {
        $this->ids = $ids;
        return $this;
    }
    
    function addToIds(string $ids)
    {
        if (!isset($this->ids))
        {
            $this->ids = array();
        }
        array_push($this->ids, $ids);
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
