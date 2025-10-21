<?php declare(strict_types=1);

namespace Relewise\Models;

class DisplayAdsRequestEntityFilters extends DisplayAdEntityStatestringDisplayAdMetadataValuesRetailMediaEntityEntityFilters
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.DisplayAdsRequest+EntityFilters, Relewise.Client";
    public ?array $ids;
    public ?array $advertiserIds;
    public ?array $templateIds;
    public ?FilterCollection $filters;
    
    public static function create() : DisplayAdsRequestEntityFilters
    {
        $result = new DisplayAdsRequestEntityFilters();
        return $result;
    }
    
    public static function hydrate(array $arr) : DisplayAdsRequestEntityFilters
    {
        $result = DisplayAdEntityStatestringDisplayAdMetadataValuesRetailMediaEntityEntityFilters::hydrateBase(new DisplayAdsRequestEntityFilters(), $arr);
        if (array_key_exists("ids", $arr))
        {
            $result->ids = array();
            foreach($arr["ids"] as &$value)
            {
                array_push($result->ids, $value);
            }
        }
        if (array_key_exists("advertiserIds", $arr))
        {
            $result->advertiserIds = array();
            foreach($arr["advertiserIds"] as &$value)
            {
                array_push($result->advertiserIds, $value);
            }
        }
        if (array_key_exists("templateIds", $arr))
        {
            $result->templateIds = array();
            foreach($arr["templateIds"] as &$value)
            {
                array_push($result->templateIds, $value);
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
    
    function setAdvertiserIds(string ... $advertiserIds)
    {
        $this->advertiserIds = $advertiserIds;
        return $this;
    }
    
    /** @param ?string[] $advertiserIds new value. */
    function setAdvertiserIdsFromArray(array $advertiserIds)
    {
        $this->advertiserIds = $advertiserIds;
        return $this;
    }
    
    function addToAdvertiserIds(string $advertiserIds)
    {
        if (!isset($this->advertiserIds))
        {
            $this->advertiserIds = array();
        }
        array_push($this->advertiserIds, $advertiserIds);
        return $this;
    }
    
    function setTemplateIds(string ... $templateIds)
    {
        $this->templateIds = $templateIds;
        return $this;
    }
    
    /** @param ?string[] $templateIds new value. */
    function setTemplateIdsFromArray(array $templateIds)
    {
        $this->templateIds = $templateIds;
        return $this;
    }
    
    function addToTemplateIds(string $templateIds)
    {
        if (!isset($this->templateIds))
        {
            $this->templateIds = array();
        }
        array_push($this->templateIds, $templateIds);
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
    
    function setStates(DisplayAdEntityState ... $states)
    {
        $this->states = $states;
        return $this;
    }
    
    /** @param ?DisplayAdEntityState[] $states new value. */
    function setStatesFromArray(array $states)
    {
        $this->states = $states;
        return $this;
    }
    
    function addToStates(DisplayAdEntityState $states)
    {
        if (!isset($this->states))
        {
            $this->states = array();
        }
        array_push($this->states, $states);
        return $this;
    }
}
