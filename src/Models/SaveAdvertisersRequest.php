<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveAdvertisersRequest extends AdvertiserstringSaveEntitiesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.SaveAdvertisersRequest, Relewise.Client";
    public static function create(string $modifiedBy) : SaveAdvertisersRequest
    {
        $result = new SaveAdvertisersRequest();
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveAdvertisersRequest
    {
        $result = AdvertiserstringSaveEntitiesRequest::hydrateBase(new SaveAdvertisersRequest(), $arr);
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
    
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
