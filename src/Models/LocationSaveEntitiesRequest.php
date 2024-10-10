<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class LocationSaveEntitiesRequest extends LicensedRequest
{
    public string $typeDefinition = "";
    
    public array $entities;
    
    public string $modifiedBy;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.RetailMedia.SaveLocationsRequest, Relewise.Client")
        {
            return SaveLocationsRequest::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = LicensedRequest::hydrateBase($result, $arr);
        if (array_key_exists("entities", $arr))
        {
            $result->entities = array();
            foreach($arr["entities"] as &$value)
            {
                array_push($result->entities, Location::hydrate($value));
            }
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
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
    
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
