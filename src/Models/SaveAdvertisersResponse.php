<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveAdvertisersResponse extends AdvertiserSaveEntitiesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.RetailMedia.SaveAdvertisersResponse, Relewise.Client";
    public static function create() : SaveAdvertisersResponse
    {
        $result = new SaveAdvertisersResponse();
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveAdvertisersResponse
    {
        $result = AdvertiserSaveEntitiesResponse::hydrateBase(new SaveAdvertisersResponse(), $arr);
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
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
