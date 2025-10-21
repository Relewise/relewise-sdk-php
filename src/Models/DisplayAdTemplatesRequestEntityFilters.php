<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdTemplatesRequestEntityFilters extends DisplayAdTemplateEntityStatestringDisplayAdTemplateMetadataValuesRetailMediaEntityEntityFilters
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.DisplayAdTemplatesRequest+EntityFilters, Relewise.Client";
    public ?array $ids;
    public ?array $keys;
    public ?FilterCollection $filters;
    
    public static function create() : DisplayAdTemplatesRequestEntityFilters
    {
        $result = new DisplayAdTemplatesRequestEntityFilters();
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdTemplatesRequestEntityFilters
    {
        $result = DisplayAdTemplateEntityStatestringDisplayAdTemplateMetadataValuesRetailMediaEntityEntityFilters::hydrateBase(new DisplayAdTemplatesRequestEntityFilters(), $arr);
        if (array_key_exists("ids", $arr))
        {
            $result->ids = array();
            foreach($arr["ids"] as &$value)
            {
                array_push($result->ids, $value);
            }
        }
        if (array_key_exists("keys", $arr))
        {
            $result->keys = array();
            foreach($arr["keys"] as &$value)
            {
                array_push($result->keys, $value);
            }
        }
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
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
    
    function setKeys(string ... $keys)
    {
        $this->keys = $keys;
        return $this;
    }
    
    /** @param ?string[] $keys new value. */
    function setKeysFromArray(array $keys)
    {
        $this->keys = $keys;
        return $this;
    }
    
    function addToKeys(string $keys)
    {
        if (!isset($this->keys))
        {
            $this->keys = array();
        }
        array_push($this->keys, $keys);
        return $this;
    }
    
    function setFilters(?FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setTerm(?string $term)
    {
        $this->term = $term;
        return $this;
    }
    
    function setStates(DisplayAdTemplateEntityState ... $states)
    {
        $this->states = $states;
        return $this;
    }
    
    /** @param ?DisplayAdTemplateEntityState[] $states new value. */
    function setStatesFromArray(array $states)
    {
        $this->states = $states;
        return $this;
    }
    
    function addToStates(DisplayAdTemplateEntityState $states)
    {
        if (!isset($this->states))
        {
            $this->states = array();
        }
        array_push($this->states, $states);
        return $this;
    }
}
