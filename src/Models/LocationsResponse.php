<?php declare(strict_types=1);

namespace Relewise\Models;

class LocationsResponse extends LocationLocationEntityStateEntityResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.RetailMedia.LocationsResponse, Relewise.Client";
    public static function create(int $hits, array $hitsPerState) : LocationsResponse
    {
        $result = new LocationsResponse();
        $result->hits = $hits;
        $result->hitsPerState = $hitsPerState;
        return $result;
    }
    
    public static function hydrate(array $arr) : LocationsResponse
    {
        $result = LocationLocationEntityStateEntityResponse::hydrateBase(new LocationsResponse(), $arr);
        return $result;
    }
    
    function setEntities(Location ... $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    /** @param Location[] $entities new value. */
    function setEntitiesFromArray(array $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    function addToEntities(Location $entities)
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
    
    function addToHitsPerState(LocationEntityState $key, int $value)
    {
        if (!isset($this->hitsPerState))
        {
            $this->hitsPerState = array();
        }
        $this->hitsPerState[$key] = $value;
        return $this;
    }
    
    /** @param array<LocationEntityState, int> $hitsPerState associative array. */
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
