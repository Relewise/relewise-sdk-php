<?php declare(strict_types=1);

namespace Relewise\Models;

class CampaignsRequestEntityFilters extends CampaignEntityStateCampaignMetadataValuesRetailMediaEntityEntityFilters
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.CampaignsRequest+EntityFilters, Relewise.Client";
    
    public ?array $ids;
    public ?array $advertiserIds;
    
    public static function create() : CampaignsRequestEntityFilters
    {
        $result = new CampaignsRequestEntityFilters();
        return $result;
    }
    
    public static function hydrate(array $arr) : CampaignsRequestEntityFilters
    {
        $result = CampaignEntityStateCampaignMetadataValuesRetailMediaEntityEntityFilters::hydrateBase(new CampaignsRequestEntityFilters(), $arr);
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
    
    function setTerm(?string $term)
    {
        $this->term = $term;
        return $this;
    }
    
    function setStates(CampaignEntityState ... $states)
    {
        $this->states = $states;
        return $this;
    }
    
    /** @param ?CampaignEntityState[] $states new value. */
    function setStatesFromArray(array $states)
    {
        $this->states = $states;
        return $this;
    }
    
    function addToStates(CampaignEntityState $states)
    {
        if (!isset($this->states))
        {
            $this->states = array();
        }
        array_push($this->states, $states);
        return $this;
    }
}
