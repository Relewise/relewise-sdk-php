<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveDisplayAdsResponse extends DisplayAdstringSaveEntitiesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.RetailMedia.SaveDisplayAdsResponse, Relewise.Client";
    public static function create() : SaveDisplayAdsResponse
    {
        $result = new SaveDisplayAdsResponse();
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveDisplayAdsResponse
    {
        $result = DisplayAdstringSaveEntitiesResponse::hydrateBase(new SaveDisplayAdsResponse(), $arr);
        return $result;
    }
    
    function setEntities(DisplayAd ... $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    /** @param DisplayAd[] $entities new value. */
    function setEntitiesFromArray(array $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    function addToEntities(DisplayAd $entities)
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
