<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveLocationsRequest extends LocationSaveEntitiesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.SaveLocationsRequest, Relewise.Client";
    public static function create(string $modifiedBy) : SaveLocationsRequest
    {
        $result = new SaveLocationsRequest();
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    public static function hydrate(array $arr) : SaveLocationsRequest
    {
        $result = LocationSaveEntitiesRequest::hydrateBase(new SaveLocationsRequest(), $arr);
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
