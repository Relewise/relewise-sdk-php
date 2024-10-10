<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class LocationSaveEntitiesResponse extends TimedResponse
{
    public string $typeDefinition = "";
    public array $entities;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.RetailMedia.SaveLocationsResponse, Relewise.Client")
        {
            return SaveLocationsResponse::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = TimedResponse::hydrateBase($result, $arr);
        if (array_key_exists("entities", $arr))
        {
            $result->entities = array();
            foreach($arr["entities"] as &$value)
            {
                array_push($result->entities, Location::hydrate($value));
            }
        }
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
