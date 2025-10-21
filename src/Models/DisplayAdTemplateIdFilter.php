<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdTemplateIdFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DisplayAdTemplateIdFilter, Relewise.Client";
    public ?array $ids;
    
    public static function create(bool $negated = false) : DisplayAdTemplateIdFilter
    {
        $result = new DisplayAdTemplateIdFilter();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdTemplateIdFilter
    {
        $result = Filter::hydrateBase(new DisplayAdTemplateIdFilter(), $arr);
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
