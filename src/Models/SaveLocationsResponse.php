<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveLocationsResponse extends LocationSaveEntitiesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.RetailMedia.SaveLocationsResponse, Relewise.Client";
    
    public static function create() : SaveLocationsResponse
    {
        $result = new SaveLocationsResponse();
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveLocationsResponse
    {
        $result = LocationSaveEntitiesResponse::hydrateBase(new SaveLocationsResponse(), $arr);
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
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
