<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveDisplayAdTemplatesResponse extends DisplayAdTemplatestringSaveEntitiesResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.RetailMedia.SaveDisplayAdTemplatesResponse, Relewise.Client";
    public static function create() : SaveDisplayAdTemplatesResponse
    {
        $result = new SaveDisplayAdTemplatesResponse();
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveDisplayAdTemplatesResponse
    {
        $result = DisplayAdTemplatestringSaveEntitiesResponse::hydrateBase(new SaveDisplayAdTemplatesResponse(), $arr);
        return $result;
    }
    
    function setEntities(DisplayAdTemplate ... $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    /** @param DisplayAdTemplate[] $entities new value. */
    function setEntitiesFromArray(array $entities)
    {
        $this->entities = $entities;
        return $this;
    }
    
    function addToEntities(DisplayAdTemplate $entities)
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
