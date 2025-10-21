<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveDisplayAdsRequest extends DisplayAdstringSaveEntitiesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.SaveDisplayAdsRequest, Relewise.Client";
    public static function create(string $modifiedBy) : SaveDisplayAdsRequest
    {
        $result = new SaveDisplayAdsRequest();
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveDisplayAdsRequest
    {
        $result = DisplayAdstringSaveEntitiesRequest::hydrateBase(new SaveDisplayAdsRequest(), $arr);
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
    
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
