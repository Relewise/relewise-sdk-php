<?php declare(strict_types=1);

namespace Relewise\Models;

class AdvertisersResponse extends AdvertiserAdvertiserEntityStateEntityResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.RetailMedia.AdvertisersResponse, Relewise.Client";
    
    public static function create(int $hits, array $hitsPerState) : AdvertisersResponse
    {
        $result = new AdvertisersResponse();
        $result->hits = $hits;
        $result->hitsPerState = $hitsPerState;
        return $result;
    }
    
    public static function hydrate(array $arr) : AdvertisersResponse
    {
        $result = AdvertiserAdvertiserEntityStateEntityResponse::hydrateBase(new AdvertisersResponse(), $arr);
        return $result;
    }
    
    function setEntities(Advertiser ... $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    /** @param Advertiser[] $entities new value. */
    function setEntitiesFromArray(array $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    function addToEntities(Advertiser $entities)
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
    
    function addToHitsPerState(AdvertiserEntityState $key, int $value)
    {
        if (!isset($this->hitsPerState))
        {
            $this->hitsPerState = array();
        }
        $this->hitsPerState[$key] = $value;
        return $this;
    }
    
    /** @param array<AdvertiserEntityState, int> $hitsPerState associative array. */
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
