<?php declare(strict_types=1);

namespace Relewise\Models;

class CampaignsResponse extends CampaignCampaignEntityStateEntityResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.RetailMedia.CampaignsResponse, Relewise.Client";
    public static function create(int $hits, array $hitsPerState) : CampaignsResponse
    {
        $result = new CampaignsResponse();
        $result->hits = $hits;
        $result->hitsPerState = $hitsPerState;
        return $result;
    }
    public static function hydrate(array $arr) : CampaignsResponse
    {
        $result = CampaignCampaignEntityStateEntityResponse::hydrateBase(new CampaignsResponse(), $arr);
        return $result;
    }
    
    function setEntities(Campaign ... $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    /** @param Campaign[] $entities new value. */
    function setEntitiesFromArray(array $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    function addToEntities(Campaign $entities)
    {
        if (!isset($this->entities))
        {
            $this->entities = array();
        }
        array_push($this->entities, $entities);
        return $this;
    }
    
    function setHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    
    function addToHitsPerState(CampaignEntityState $key, int $value)
    {
        if (!isset($this->hitsPerState))
        {
            $this->hitsPerState = array();
        }
        $this->hitsPerState[$key] = $value;
        return $this;
    }
    
    /** @param array<CampaignEntityState, int> $hitsPerState associative array. */
    function setHitsPerStateFromAssociativeArray(array $hitsPerState)
    {
        $this->hitsPerState = $hitsPerState;
        return $this;
    }
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
